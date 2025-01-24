<?php

namespace App\Http\Requests\StaffCommendation;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'commendation' => $this->requiredString,
        ];
    }
}
