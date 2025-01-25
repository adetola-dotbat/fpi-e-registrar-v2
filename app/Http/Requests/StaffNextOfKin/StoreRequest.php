<?php

namespace App\Http\Requests\StaffNextOfKin;

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
            'user_id' => 'required|uuid|exists:users,id',
            'relationship_id' => 'required|exists:relationships,id|integer',
            'fullname' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ];
    }
}
