<?php

namespace App\Models;

use App\Enums\ApproveStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffProfessionalDetails extends Model
{
    use HasUuids;
    protected $attributes = [
        'status' => ApproveStatusEnum::PENDING->value,
    ];
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
