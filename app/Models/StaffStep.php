<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffStep extends Model
{
    use HasUuids;
    protected $guarded = ['id'];

    // public function staffDetail(): BelongsTo
    // {
    //     return $this->belongsTo(StaffDetail::class, 'staff_step_id');
    // }
}
