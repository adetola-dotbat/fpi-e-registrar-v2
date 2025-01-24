<?php

namespace App\Services;

use App\Models\StaffPublicService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffPublicServiceService extends UserService
{
    public function __construct(protected StaffPublicService $staffPublicService) {}


    public function getStaffPublicServices($id)
    {
        return $this->staffPublicService->where('user_id', $id)->get();
    }

    public function getStaffPublicService($id)
    {
        if (!$this->staffPublicService->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff public service record not found.");
        }

        return $this->staffPublicService->find($id);
    }
    public function store($data)
    {
        return $this->staffPublicService->create($data);
    }

    public function destroy($id)
    {
        if (!$this->staffPublicService->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff public service record  not found.");
        }

        $this->staffPublicService->whereId($id)->delete();
    }
}
