<?php

namespace App\Services;

class StaffService extends UserService
{

    public function all()
    {
        return $this->user->all();
    }

    public function getStaff($id)
    {
        return $this->getUser($id);
    }
}
