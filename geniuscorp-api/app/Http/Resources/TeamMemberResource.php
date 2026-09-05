<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'name'         => $this->name,
            'job_title'    => $this->job_title,
            'bio'          => $this->bio,
            'photo'        => $this->photo,
            'email'        => $this->email,
            'social_links' => $this->social_links ?? [],
            'url'          => '/team/#' . $this->slug,
        ];
    }
}
