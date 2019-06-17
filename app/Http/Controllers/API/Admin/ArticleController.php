<?php

namespace App\Http\Controllers\API\Admin;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy()->get();
        return response()->json($articles);
    }
}