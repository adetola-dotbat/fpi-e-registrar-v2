<?php

namespace App\Services;

use App\Models\StaffActingAppointment;
use App\Notifications\ActingAppointmentNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffActingAppointmentService extends UserService
{
    public function __construct(protected StaffActingAppointment $staffActingAppointment) {}

    public function actingAppointments()
    {
        if (auth()->user()->account_type != 'management') {
            return $this->staffActingAppointment->where('user_id', auth()->id())->latest()->get();
        }
        return $this->staffActingAppointment->latest()->get();
    }

    public function allStaffActingAppointments($id)
    {
        return $this->staffActingAppointment->where('user_id', $id)->get();
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $actingAppointment = $this->staffActingAppointment->create($data);
                $user = $actingAppointment->user;
                $user->notify(new ActingAppointmentNotification());
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
