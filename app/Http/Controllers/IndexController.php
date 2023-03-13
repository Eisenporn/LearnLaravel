<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends Controller
{

    public function home()
    {
        $articles=Article::query()->where('is_published', '=', true)->get();


        return view('home', [
            'articles'=>$articles
        ]);
    }

    public function signup()
    {
        return view('signup');
    }

    public function signin()
    {
        return view('signin');
    }
}
