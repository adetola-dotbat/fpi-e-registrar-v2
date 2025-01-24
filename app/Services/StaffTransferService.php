<?php

namespace App\Services;

use App\Models\StaffTransfer;

class StaffTransferService extends UserService
{
    public function __construct(protected StaffTransfer $staffTransfer) {}


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
}
