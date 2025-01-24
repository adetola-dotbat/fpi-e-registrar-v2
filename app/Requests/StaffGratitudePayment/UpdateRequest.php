<?php

namespace App\Http\Requests\StaffGratitudePayment;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:staff_gratitude_payments,id',
            'date_of_payment' => 'required|date',
            'from' => 'required|date',
            'to' => 'required|date',
            'rate_of_gratuity' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'file_page_ref' => $this->requiredString,
            'checked_by' => $this->requiredString,
        ];
    }
}
