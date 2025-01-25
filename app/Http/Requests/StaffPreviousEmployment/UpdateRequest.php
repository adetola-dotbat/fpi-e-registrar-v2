<?php

namespace App\Http\Requests\StaffPreviousEmployment;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

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
            'id' => 'required|exists:previous_employments,id',
            // 'user_id' => 'required|exists:users,id',
            'company' => 'required|string',
            'position_held' => 'required|string',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'salary' => 'required|numeric',
            'reason_for_leaving' => 'required|string',
            'name_of_employer' => 'required|string',
            'employer_address' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'The selected user ID does not exist.',
            'company.required' => 'The company name is required.',
            'position_held.required' => 'The position held is required.',
            'date_from.required' => 'The start date is required.',
            'date_from.before_or_equal' => 'The start date must be before or equal to the end date.',
            'date_to.required' => 'The end date is required.',
            'date_to.after_or_equal' => 'The end date must be after or equal to the start date.',
            'salary.required' => 'The salary is required.',
            'salary.numeric' => 'The salary must be a number.',
            'reason_for_leaving.required' => 'The reason for leaving is required.',
            'name_of_employer.required' => 'The name of the employer is required.',
            'employer_address.required' => 'The employer address is required.',
        ];
    }
}
