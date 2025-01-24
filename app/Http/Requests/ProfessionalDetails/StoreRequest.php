<?php

namespace App\Http\Requests\ProfessionalDetails;

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
            'id' => 'required|exists:staff_professional_details,id',
            'professional_name' => 'required|string',
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'year' => 'required|date',
        ];
    }
}
