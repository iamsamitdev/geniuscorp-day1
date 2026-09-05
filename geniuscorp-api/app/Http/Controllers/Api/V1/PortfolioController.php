<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $items = Portfolio::published()
            ->with('service')
            ->orderByDesc('completed_at')
            ->get();

        return PortfolioResource::collection($items);
    }

    public function show(Portfolio $portfolio): PortfolioResource
    {
        abort_unless($portfolio->is_published, 404);

        return new PortfolioResource($portfolio->load('service'));
    }
}
