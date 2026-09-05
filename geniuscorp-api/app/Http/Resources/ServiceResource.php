<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'              => $this->slug,
            'name'              => $this->name,
            'short_description' => $this->short_description,
            'description'       => $this->description,
            'price_from'        => $this->price_from !== null ? (float) $this->price_from : null,
            'price_currency'    => $this->price_currency,
            'duration_days'     => $this->duration_days,
            'icon'              => $this->icon,
            'url'               => '/services/' . $this->slug . '/',
            'published_at'      => $this->published_at?->toIso8601String(),
            'updated_at'        => $this->updated_at?->toIso8601String(),
            'faqs'              => FaqResource::collection($this->whenLoaded('faqs')),
        ];
    }
}
