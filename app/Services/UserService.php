<?php

namespace App\Services;

use App\Models\User;

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
}
