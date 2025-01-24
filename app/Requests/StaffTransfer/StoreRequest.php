<?php

namespace App\Http\Requests\StaffTransfer;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'current_department' => $this->requiredString,
            'current_position' => $this->requiredString,
            'new_department' => $this->requiredString,
            'new_position' => $this->requiredString,
            'effective_date' => 'required|date',
        ];
    }
}
