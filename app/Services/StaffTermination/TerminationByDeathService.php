<?php

namespace App\Services\StaffTermination;

use App\Models\TerminationByDeath;
use App\Notifications\TerminationNotification;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TerminationByDeathService extends UserService
{
    public function __construct(protected TerminationByDeath $terminationByDeath) {}

    public function terminationByDeaths()
    {
        return $this->terminationByDeath->latest()->get();
    }
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
        return DB::transaction(function () use ($data) {
            try {

                $termination = $this->terminationByDeath->create($data);
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
        if (!$this->terminationByDeath->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff termination record  not found.");
        }

        $this->terminationByDeath->whereId($id)->delete();
    }
}
