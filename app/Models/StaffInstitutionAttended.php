<?php

namespace App\Models;

use App\Enums\ApproveStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffInstitutionAttended extends Model
{
    use HasUuids;
    protected $guarded = ['id'];
    protected $attributes = [
        'approved_status' => ApproveStatusEnum::PENDING->value,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
