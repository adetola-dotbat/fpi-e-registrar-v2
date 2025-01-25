<?php

namespace App\Http\Requests\StaffDocument;

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
            'document' => $this->requiredString,
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',

        ];
    }
}
