<?php

namespace App\Http\Requests\StaffPublicService;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'organization' => $this->requiredString,
            'start_date' => $this->requiredDate,
            'end_date' => $this->requiredDate,
            'pensionable_emolument' => $this->requiredString,
        ];
    }
}
