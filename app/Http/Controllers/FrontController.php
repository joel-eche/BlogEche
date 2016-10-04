<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Tag;
use App\Category;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }

    public function index()
    {
        $articles=Article::orderBy('id','DESC')->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        return view('front.index')
                ->with('articles',$articles)
        ;
    }

    public function searchCategory($name){
        $category=Category::SearchCategory($name)->first();
        
        $articles=$category->articles()->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        return view('front.index')
                ->with('articles',$articles);
        ;
    }

    public function searchTag($name){
        $tag=Tag::SearchTag($name)->first();
        $articles=$tag->articles2()->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        return view('front.index')
                ->with('articles',$articles);
        ;
    }

    public function viewArticle($slug){
        $article=Article::SearchSlug($slug)->first();
        //dd($article);
        $article->category;
        $article->user;
        $article->tags;
        $article->images;
        return view('front.article')->with('article',$article);
    }
}
