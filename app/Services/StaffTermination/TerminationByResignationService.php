<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByResignation;
use App\Notifications\TerminationNotification;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        return DB::transaction(function () use ($data) {
            try {

                $termination = $this->terminationByResignation->create($data);
                $user = $termination->user;
                $user->notify(new TerminationNotification());
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }
    public function destroy($id)
    {
        if (!$this->terminationByResignation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByResignation->whereId($id)->delete();
    }
}
