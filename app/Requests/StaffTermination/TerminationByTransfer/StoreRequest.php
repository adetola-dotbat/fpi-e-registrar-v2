<?php

namespace App\Http\Requests\StaffTermination\TerminationByTransfer;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'transfer_date' => 'required|date',
            'type' => 'required|string',
            'aggregate_service' => 'required|string',
        ];
    }
}
