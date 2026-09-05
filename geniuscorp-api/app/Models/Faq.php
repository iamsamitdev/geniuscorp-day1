<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'question', 'answer', 'sort_order'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
