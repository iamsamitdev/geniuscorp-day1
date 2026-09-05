<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeamMemberController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TeamMemberResource::collection(
            TeamMember::orderBy('sort_order')->get()
        );
    }
}
