<?php

namespace App\Http\Requests\StaffBankDetails;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'bank_name' => $this->requiredString,
            'account_number' => 'required|numeric',
            'account_name' => $this->requiredString,
        ];
    }
}
