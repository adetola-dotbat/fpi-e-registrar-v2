<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function __construct(protected User $user) {}

    public function getUser($id)
    {
        return $this->user->with([
            'staffDetail',
            'previousEmployments',
            'nextOfKins',
            'emergencies',
            'staffBankDetails',
            'staffInstitutionsAttended',
            'staffProfessionalDetails'
        ])->find($id);
    }

    public function getManagementUser()
    {
        return $this->user->where('account_type', 'management')->get();
    }

    public function store($data)
    {

        $user = $this->user->create([
            'title' => $data['title'],
            'surname' => $data['surname'],
            'first_name' => $data['first_name'],
            'other_name' => $data['other_name'] ?? null,
            'email' => $data['email'],
            'account_type' => 'management',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($data['roles']);

        return $user;
    }
}
