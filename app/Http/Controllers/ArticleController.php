<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(10);
        $title ='All Articles';

        return view('articles.index', compact('articles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        // $validator = validator($request->all(), [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }

        $article = new Article();
        // $article->title = $request->title;
        // $article->description = $request->description;
        // $article->save();
        $article->create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect('/')->with('info', 'Successfully created!');
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
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $article = Article::findOrFail($id);
        // $article->title = $request->title;
        // $article->description = $request->description;
        // $article->save();
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect('/')->with('info', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/')->with('info', "Successfully deleted!");
    }
}
