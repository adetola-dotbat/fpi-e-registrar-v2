<?php

namespace App\Services;

use App\Models\StaffActingAppointment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function destroy($id)
    {
        if (!$this->staffActingAppointment->whereId($id)->exists()) {
            throw new ModelNotFoundException("Record  not found.");
        }

        $this->staffActingAppointment->whereId($id)->delete();
    }
}
