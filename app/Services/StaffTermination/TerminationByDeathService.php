<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByDeath;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TerminationByDeathService extends UserService
{
    public function __construct(protected TerminationByDeath $terminationByDeath) {}


    public function getStaffTerminationByDeaths($id)
    {
        return $this->terminationByDeath->where('user_id', $id)->latest()->first();
    }

    public function getStaffTerminationByDeath($id)
    {
        if (!$this->terminationByDeath->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record not found.");
        }

        return $this->terminationByDeath->find($id);
    }
    public function store($data)
    {
        return $this->terminationByDeath->create($data);
    }

    public function destroy($id)
    {
        if (!$this->terminationByDeath->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByDeath->whereId($id)->delete();
    }
}
