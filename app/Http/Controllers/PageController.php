<?php

namespace App\Http\Controllers;

use App\About;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact_us()
    {

    }

    public function about()
    {
        return view('about');
    }

    public function about_create()
    {
        return view('about_create');
    }

    public function about_store()
    {
        $about = About::all();

    }
}
