<?php

namespace App\Services;

use App\Models\StaffCommendation;
use App\Notifications\CommendationNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffCommendationService extends UserService
{
    public function __construct(protected StaffCommendation $staffCommendation) {}

    public function commendations()
    {
        if (auth()->user()->account_type != 'management') {
            return $this->staffCommendation->where('user_id', auth()->id())->latest()->get();
        }
        return $this->staffCommendation->latest()->get();
    }
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
        return DB::transaction(function () use ($data) {
            try {

                $commendation = $this->staffCommendation->create($data);
                $user = $commendation->user;
                $user->notify(new CommendationNotification());
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }

    public function destroy($id)
    {
        if (!$this->staffCommendation->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff commendation record  not found.");
        }

        $this->staffCommendation->whereId($id)->delete();
    }
}
