<?php

namespace App\Services;

use App\Models\StaffGratitudePayment;
use App\Models\StaffPromotion;
use App\Models\StaffTransfer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StaffGratitudePaymentService extends UserService
{
    public function __construct(protected StaffGratitudePayment $staffGratitudePayment) {}


    public function allStaffGratitudePayments($id)
    {
        return $this->staffGratitudePayment->where('user_id', $id)->get();
    }
    public function store($data)
    {
        return $this->staffGratitudePayment->create($data);
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
