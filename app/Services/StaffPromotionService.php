<?php

namespace App\Services;

use App\Models\StaffPromotion;
use App\Models\StaffTransfer;
use App\Notifications\PromotionNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffPromotionService extends UserService
{
    public function __construct(protected StaffPromotion $staffPromotion) {}
    public function promotions()
    {
        if (auth()->user()->account_type != 'management') {
            return $this->staffPromotion->where('user_id', auth()->id())->latest()->get();
        }
        return $this->staffPromotion->latest()->get();
    }

    public function staffPromotions($id)
    {
        return $this->staffPromotion->where('user_id', $id)->get();
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $promotion = $this->staffPromotion->create($data);
                $user = $promotion->user;
                $user->notify(new PromotionNotification());
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffPromotion->whereId($id)->update($data);
    }

    public function destroy($id)
    {
        if (!$this->staffPromotion->whereId($id)->exists()) {
            throw new ModelNotFoundException("Promotion record  not found.");
        }

        $this->staffPromotion->whereId($id)->delete();
    }
}
