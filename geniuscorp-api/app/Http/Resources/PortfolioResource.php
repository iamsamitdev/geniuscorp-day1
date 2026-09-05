<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'title'        => $this->title,
            'client_name'  => $this->client_name,
            'summary'      => $this->summary,
            'description'  => $this->description,
            'cover_image'  => $this->cover_image,
            'completed_at' => $this->completed_at?->toDateString(),
            'service'      => $this->whenLoaded('service', fn () => [
                'slug' => $this->service->slug,
                'name' => $this->service->name,
                'url'  => '/services/' . $this->service->slug . '/',
            ]),
            'url'          => '/portfolio/' . $this->slug . '/',
            'updated_at'   => $this->updated_at?->toIso8601String(),
        ];
    }
}
