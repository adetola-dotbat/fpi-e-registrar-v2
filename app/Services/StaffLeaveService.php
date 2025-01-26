<?php

namespace App\Services;

use App\Models\StaffLeave;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffLeaveService extends UserService
{
    public function __construct(protected StaffLeave $staffLeave) {}
    public function leaves()
    {
        return $this->staffLeave->latest()->get();
    }
    public function getStaffLeaves($id)
    {
        return $this->staffLeave->where('user_id', $id)->get();
    }
    public function getStaffLeave($id)
    {
        if (!$this->staffLeave->whereId($id)->exists()) {
            throw new ModelNotFoundException("Leave not found.");
        }
        return $this->staffLeave->find($id);
    }
    public function store($data)
    {
        return $this->staffLeave->create($data);
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffLeave->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->staffLeave->whereId($id)->exists()) {
            throw new ModelNotFoundException("Leave not found.");
        }
        $this->staffLeave->whereId($id)->delete();
    }
}
