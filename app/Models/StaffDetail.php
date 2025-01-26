<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StaffDetail extends Model
{
    use HasUuids;
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function staffStep(): HasOne
    {
        return $this->hasOne(StaffStep::class, 'staff_step_id');
    }

    public function staffCadre(): BelongsTo
    {
        return $this->belongsTo(StaffCadre::class, 'staff_cadre_id');
    }
}
