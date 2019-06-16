<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        /*$articles = Article::orderBy('created_at', 'desc')->get();
        return view('public.blog.index', compact('articles'));*/
        return view('public.blog.index');
    }

    public function show(Article $article)
    {
        return view('public.blog.show', compact('article'));
    }
}
