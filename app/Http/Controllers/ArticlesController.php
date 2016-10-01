<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ArticleRequest;

use App\Article;

use Auth;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth' , ['except'=>['index' , 'show']]);
    }
    

    public function index()
    {

    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index' , compact('articles'));
    }


    public function show($id)
    {
    	$articles = Article::findOrfail($id);

    	return view('articles.show' , compact('articles'));
    }


    public function create()
    {
    	return view('articles.create');
    }


    public function store(ArticleRequest $request)
    {
    	
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

    	// Article::create($request->all());

    	return redirect('articles');
    }


    public function edit($id)
    {
    	$articles = Article::findOrfail($id);

    	return view('articles.edit' , compact('articles'));
    }


    public function update($id , ArticleRequest $request)
    {
    	$articles = Article::findOrfail($id);

    	$articles->update($request->all());

    	return redirect('articles');
    }
}
