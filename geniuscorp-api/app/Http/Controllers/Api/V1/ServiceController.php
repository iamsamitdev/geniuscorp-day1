<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $services = Service::published()
            ->with('faqs')
            ->orderBy('sort_order')
            ->get();

        return ServiceResource::collection($services);
    }

    public function show(Service $service): ServiceResource
    {
        abort_unless($service->is_published, 404);

        return new ServiceResource($service->load('faqs'));
    }
}
