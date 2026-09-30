<?php

namespace App\Models;

use App\Enums\Enums\CardStatus;
use App\Enums\ProductMode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $hidden = [
        'pin_hash',
    ];

    protected function casts(): array
    {
        return [
            'product_mode' => ProductMode::class,
            'status' => CardStatus::class,
            'activated_at' => 'datetime',
            'last_accessed_at' => 'datetime',
            'suspended_at' => 'datetime',
        ];
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function googleBusiness(): BelongsTo
    {
        return $this->belongsTo(GoogleBusiness::class);
    }

    public function currentTarget(): HasOne
    {
        return $this->hasOne(CardGoogleTarget::class)
            ->where('is_current', true);
    }

    public function targets(): HasMany
    {
        return $this->hasMany(CardGoogleTarget::class);
    }

    public function activations(): HasMany
    {
        return $this->hasMany(CardActivation::class);
    }

    public function accessLogs(): HasMany
    {
        return $this->hasMany(CardAccessLog::class);
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(feedback::class);
    }
}
