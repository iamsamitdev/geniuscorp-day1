<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $articles = Article::published()
            ->with('author')
            ->orderByDesc('published_at')
            ->get();

        return ArticleResource::collection($articles);
    }

    public function show(Article $article): ArticleResource
    {
        abort_unless($article->is_published, 404);

        return new ArticleResource($article->load('author'));
    }
}
