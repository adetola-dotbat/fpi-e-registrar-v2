<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByTransfer;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
        return $this->terminationByTransfer->create($data);
    }

    public function destroy($id)
    {
        if (!$this->terminationByTransfer->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByTransfer->whereId($id)->delete();
    }
}
