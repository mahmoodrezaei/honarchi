<?php

namespace App\Http\Controllers\API\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return response()->json($articles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'published_date' => 'required',
            'feature_image' => 'required'
        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'feature_image' => $request->file('feature_image')
                ->storeAs('featureImages',
                    Str::random(30) . '.' . $request->file('feature_image')->getClientOriginalExtension(),
                    'public'),
            'body' => $request->body,
            'published_date' => $request->published_date,
        ]);

        $article->seo()->create([
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return response()->json([
            'message' => 'مقاله با موفقیت ذخیره شد.',
            'article' => $article
        ]);
    }

    public function show(Article $article)
    {
        return response()->json([
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        /*$request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'published_date' => 'required',
        ]);*/

        /*if ($request->has('feature_image')) {

        } else {
            $article->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'body' => $request->body,
                'published_date' => $request->published_date,
            ]);
        }*/

        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'published_date' => $request->published_date,
        ]);

        return response()->json([
            'message' => 'مقاله با موفقیت بروزرسانی شد.',
            'article' => $request->all()
        ]);
    }
}