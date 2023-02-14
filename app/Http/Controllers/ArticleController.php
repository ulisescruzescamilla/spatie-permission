<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditArticlesRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        return ArticleResource::collection(
            Article::all()
        );
    }


    public function edit(EditArticlesRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $article->save();

        return new ArticleResource($article);
    }
}
