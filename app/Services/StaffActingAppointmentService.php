<?php

namespace App\Services;

use App\Models\StaffActingAppointment;


class StaffActingAppointmentService extends UserService
{
    public function __construct(protected StaffActingAppointment $staffActingAppointment) {}


    public function allStaffActingAppointments($id)
    {
        return $this->staffActingAppointment->where('user_id', $id)->get();
    }
    public function store($data)
    {
        return $this->staffActingAppointment->create($data);
    }

    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffActingAppointment->whereId($id)->update($data);
    }
}
