<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NextOfKin extends Model
{
    use HasUuids;
    protected $guarded = ['id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class, 'relationship_id');
    }
}
