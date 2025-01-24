<?php

namespace App\Http\Requests\StaffPublicService;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:staff_transfers,id',
            'organization' => $this->requiredString,
            'start_date' => $this->requiredDate,
            'end_date' => $this->requiredDate,
            'pensionable_emolument' => $this->requiredString,
        ];
    }
}
