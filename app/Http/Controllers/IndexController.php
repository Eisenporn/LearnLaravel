<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends Controller
{

    public function home(Request $request)
    {
        $articles=Article::query()->where('is_published', '=', true); //->get();

        // $_GET['q']
        if ($request->get('query')){
            $query=$request->get('query');

            $articles=$articles->where('title', 'LIKE', "%$query%")->ofWhere('content', 'LIKE',
        "%$query%");
        }

        $articles=$articles->paginate(1)->withQueryString();

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
