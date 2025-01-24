<?php

namespace App\Http\Requests\StaffTermination\TerminationByResignation;

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
            'date_terminated' => 'required|date',
            'type' => 'required|string',
            'pension_amount' => 'required|numeric',
            'pension_from' => 'nullable|string',
            'gratuity_amount' => 'required|string',
            'contract_gratuity' => 'required|string',
        ];
    }
}
