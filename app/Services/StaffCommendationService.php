<?php

namespace App\Services;

use App\Models\StaffCommendation;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffCommendationService extends UserService
{
    public function __construct(protected StaffCommendation $staffCommendation) {}


    public function getStaffCommendations($id)
    {
        return $this->staffCommendation->where('user_id', $id)->get();
    }

    public function getStaffCommendation($id)
    {
        if (!$this->staffCommendation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff commendation record not found.");
        }

        return $this->staffCommendation->find($id);
    }
    public function store($data)
    {
        return $this->staffCommendation->create($data);
    }

    public function destroy($id)
    {
        if (!$this->staffCommendation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff commendation record  not found.");
        }

        $this->staffCommendation->whereId($id)->delete();
    }
}
