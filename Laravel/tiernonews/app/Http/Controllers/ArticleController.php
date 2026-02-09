<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //devuelve una vista con un formulario de creación
        return view('article.create');
    }

    /**
     * Crear artiuclos a través del formulario.
     */
    public function store(Request $request)
    {
        $a = new Article($request->all());

        //Antes de guardar en la BD se hacen validaciones.
        $request->validate([
            'title' => 'required', 
            'content' => 'required',
            'readers' => 'min:1|required'
        ]);

        $a->save();
        return redirect()->route('article.create');
    }




    /**
     * Display the specified resource.
     */
    public function show(Article $id)
    {
        $article = Article::find($id);
        return view('article.show', compact("article"));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $id)
    {
        $article = Article::find($id);
        return view('article.edit', compact("article"));

    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $id)
    {
       
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
