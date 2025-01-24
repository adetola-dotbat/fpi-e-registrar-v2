<?php

namespace App\Http\Requests\StaffInstitutionAttended;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:staff_institution_attendeds,id',
            'school_name' => 'required|string',
            'course_study' => 'required|string',
            'qualification' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'date_obtained' => 'required|date',
            'count' => 'nullable|integer|min:1',
        ];
    }
}
