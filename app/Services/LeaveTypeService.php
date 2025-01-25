<?php

namespace App\Services;

use App\Models\LeaveType;
use App\Models\StaffLeave;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class LeaveTypeService extends UserService
{

    public function __construct(protected LeaveType $leaveType) {}

    public function all()
    {
        return $this->leaveType->all();
    }
}
