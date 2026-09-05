<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'name', 'job_title', 'bio', 'photo', 'email', 'social_links', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'social_links' => 'array',
        ];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }
}
