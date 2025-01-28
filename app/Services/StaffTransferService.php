<?php

namespace App\Services;

use App\Models\StaffTransfer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        return $this->staffTransfer->create($data);
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
