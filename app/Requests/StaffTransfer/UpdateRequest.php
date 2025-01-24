<?php

namespace App\Http\Requests\StaffTransfer;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:staff_transfers,id',
            'current_department' => $this->requiredString,
            'current_position' => $this->requiredString,
            'new_department' => $this->requiredString,
            'new_position' => $this->requiredString,
            'effective_date' => 'required|date',
        ];
    }
}
