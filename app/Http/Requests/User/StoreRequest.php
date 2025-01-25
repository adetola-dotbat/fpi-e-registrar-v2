<?php

namespace App\Http\Requests\User;

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
            'title' => 'required|string|max:10',
            'surname' => 'required|string',
            'first_name' => 'required|string',
            'other_name' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|array|min:1',
            'roles.*' => 'in:admin,subadmin,member',
        ];
    }
}
