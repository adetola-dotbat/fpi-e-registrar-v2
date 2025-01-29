<?php

namespace App\Services;

use App\Models\StaffGratitudePayment;
use App\Models\StaffPromotion;
use App\Models\StaffTransfer;
use App\Notifications\GratuityPaymentNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffGratitudePaymentService extends UserService
{
    public function __construct(protected StaffGratitudePayment $staffGratitudePayment) {}

    public function gratitudePayments()
    {
        if (auth()->user()->account_type != 'management') {
            return $this->staffGratitudePayment->where('user_id', auth()->id())->latest()->get();
        }
        return $this->staffGratitudePayment->latest()->get();
    }

    public function allStaffGratitudePayments($id)
    {
        return $this->staffGratitudePayment->where('user_id', $id)->get();
    }
    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $gratuity = $this->staffGratitudePayment->create($data);
                $user = $gratuity->user;
                $user->notify(new GratuityPaymentNotification());
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }

    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffGratitudePayment->whereId($id)->update($data);
    }

    public function destroy($id)
    {
        if (!$this->staffGratitudePayment->whereId($id)->exists()) {
            throw new ModelNotFoundException("Record  not found.");
        }

        $this->staffGratitudePayment->whereId($id)->delete();
    }
}
