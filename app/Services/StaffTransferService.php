<?php

namespace App\Services;

use App\Models\StaffTransfer;
use App\Notifications\TransferNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffTransferService extends UserService
{
    public function __construct(protected StaffTransfer $staffTransfer) {}

    public function transfers()
    {
        if (auth()->user()->account_type != 'management') {
            return $this->staffTransfer->where('user_id', auth()->id())->latest()->get();
        }
        return $this->staffTransfer->latest()->get();
    }

    public function staffTransfers($id)
    {
        return $this->staffTransfer->where('user_id', $id)->get();
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $transfer = $this->staffTransfer->create($data);
                $user = $transfer->user;
                $user->notify(new TransferNotification());
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

        return $this->staffTransfer->whereId($id)->update($data);
    }

    public function destroy($id)
    {
        if (!$this->staffTransfer->whereId($id)->exists()) {
            throw new ModelNotFoundException("Transfer record  not found.");
        }

        $this->staffTransfer->whereId($id)->delete();
    }
}
