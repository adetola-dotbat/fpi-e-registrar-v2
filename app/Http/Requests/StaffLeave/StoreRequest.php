<?php

namespace App\Http\Requests\StaffLeave;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

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
            'date_leave_requested' => 'required|date',
            'date_resume_duty' => 'required|date',
            'leave_address' => 'required|string',
            'recommend' => 'required|string',
            'leave_type_id' => 'required|exists:leave_types,id',
            'reasons' => 'required|string',
        ];
    }
}
