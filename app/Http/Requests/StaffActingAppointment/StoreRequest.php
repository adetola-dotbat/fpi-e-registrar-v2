<?php

namespace App\Http\Requests\StaffActingAppointment;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'position' => $this->requiredString,
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reference' => $this->requiredString,
            'rate_of_allowance' => 'required|numeric',
        ];
    }
}
