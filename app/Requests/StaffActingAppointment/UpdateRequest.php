<?php

namespace App\Http\Requests\StaffActingAppointment;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:staff_acting_appointments,id',
            'position' => $this->requiredString,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:from',
            'reference' => $this->requiredString,
            'rate_of_allowance' => 'required|numeric',
        ];
    }
}
