<?php

namespace App\Http\Requests\StaffTermination\TerminationByDeath;

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
            'date_of_death' => 'required|date',
            'estate_gratuity' => 'required|string',
            'widow_pension' => 'nullable|string',
            'widow_pension_from' => 'nullable|string',
            'orphan_pension' => 'nullable|string',
            'orphan_pension_from' => 'nullable|string',
        ];
    }
}
