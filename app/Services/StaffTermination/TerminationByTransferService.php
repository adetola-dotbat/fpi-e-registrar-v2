<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByTransfer;
use App\Notifications\TerminationNotification;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TerminationByTransferService extends UserService
{
    public function __construct(protected TerminationByTransfer $terminationByTransfer) {}

    public function terminationByTransfers()
    {
        return $this->terminationByTransfer->latest()->get();
    }
    public function getStaffTerminationByTransfers($id)
    {
        return $this->terminationByTransfer->where('user_id', $id)->latest()->first();
    }

    public function getStaffTerminationByTransfer($id)
    {
        if (!$this->terminationByTransfer->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record not found.");
        }

        return $this->terminationByTransfer->find($id);
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $termination = $this->terminationByTransfer->create($data);
                $user = $termination->user;
                $user->notify(new TerminationNotification());
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }

    public function destroy($id)
    {
        if (!$this->terminationByTransfer->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByTransfer->whereId($id)->delete();
    }
}
