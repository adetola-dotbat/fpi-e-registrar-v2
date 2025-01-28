<?php

namespace App\Services;

use App\Models\StaffPromotion;
use App\Models\StaffTransfer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        return $this->staffPromotion->create($data);
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
