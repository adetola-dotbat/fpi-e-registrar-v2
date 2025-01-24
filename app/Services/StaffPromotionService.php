<?php

namespace App\Services;

use App\Models\StaffPromotion;
use App\Models\StaffTransfer;

class StaffPromotionService extends UserService
{
    public function __construct(protected StaffPromotion $staffPromotion) {}


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
}
