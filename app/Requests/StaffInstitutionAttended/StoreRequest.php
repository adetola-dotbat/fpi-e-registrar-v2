<?php

namespace App\Http\Requests\StaffInstitutionAttended;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'school_name' => 'required|string',
            'course_study' => 'required|string',
            'qualification' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'date_obtained' => 'required|date',
            'count' => 'nullable|integer|min:1',
        ];
    }
}
