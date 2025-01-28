<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByResignation;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TerminationByResignationService extends UserService
{
    public function __construct(protected TerminationByResignation $terminationByResignation) {}

    public function terminationByResignations()
    {
        return $this->terminationByResignation->latest()->get();
    }

    public function getStaffTerminationByResignations($id)
    {
        return $this->terminationByResignation->where('user_id', $id)->latest()->first();
    }

    public function getStaffTerminationByResignation($id)
    {
        if (!$this->terminationByResignation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record not found.");
        }

        return $this->terminationByResignation->find($id);
    }
    public function store($data)
    {
        return $this->terminationByResignation->create($data);
    }

    public function destroy($id)
    {
        if (!$this->terminationByResignation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByResignation->whereId($id)->delete();
    }
}
