<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Tag;
use App\Image;
use App\Article;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles=Article::Search($request->title)->orderBy('id','DESC')->paginate(5);
        
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });
        
        //dd($articles);
        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','ASC')->lists('name','id');
        $tags=Tag::orderBy('name','ASC')->get()->lists('name','id');

        return view('admin.articles.create')
        ->with('categories',$categories)
        ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        if ($request->file('image')) {
            $file=$request->file('image');
            $name='blogjoel_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/images/articles/';
            $file->move($path,$name);    
        }

        $article=new Article($request->all());
        $article->user_id=\Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image=new Image();
        $image->name=$name;
        $image->article()->associate($article);
        $image->save();

        Flash::success('Artículo creado');
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $categories=Category::orderBy('id','DESC')->lists('name','id');
        $tags=Tag::orderBy('id','DESC')->lists('name','id');
        $my_tags=$article->tags->lists('id')->toArray();
        
        return view('admin.articles.edit')
                ->with('article',$article)
                ->with('categories',$categories)
                ->with('tags',$tags)
                ->with('my_tags',$my_tags)
                ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article=Article::find($id);
        $article->fill($request->all());
        $article->save();
        $article->tags()->sync($request->tags);
        Flash::warning('Artículo modificado');
        return redirect()->route('admin.articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        Flash::error('S¿Articulo eliminado');
        return redirect()->route('admin.articles.index');
    }
}
