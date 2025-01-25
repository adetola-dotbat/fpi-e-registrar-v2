<?php

namespace App\Services;

use App\Models\NextOfKin;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffNextOfKinService extends UserService
{
    public function __construct(protected NextOfKin $nextOfKin) {}
    public function getNextOfKins($id)
    {
        return $this->nextOfKin->where('user_id', $id)->get();
    }
    public function getNextOfKin($id)
    {
        if (!$this->nextOfKin->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        return $this->nextOfKin->find($id);
    }
    public function store($data)
    {
        return $this->nextOfKin->create($data);
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->nextOfKin->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->nextOfKin->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        $this->nextOfKin->whereId($id)->delete();
    }
}
