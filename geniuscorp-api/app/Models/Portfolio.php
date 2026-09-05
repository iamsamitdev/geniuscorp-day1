<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'slug', 'title', 'client_name', 'summary', 'description',
        'cover_image', 'completed_at', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
