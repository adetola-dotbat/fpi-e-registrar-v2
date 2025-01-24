<?php

namespace App\Http\Requests\StaffPromotion;

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
            'id' => 'required|exists:staff_promotions,id',
            'new_department' => $this->requiredString,
            'new_position' => $this->requiredString,
            'date_of_appointment' => 'required|date',
            'cadre' =>  $this->requiredString,
            'salary' =>  $this->requiredString,
            'authority' => $this->requiredString,
            'remarks' => 'sometimes|nullable|string',
        ];
    }
}
