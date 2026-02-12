<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
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
        $journalists = Journalist::all();
        //devuelve una vista con un formulario de creación
        return view('article.create', compact('journalists'));
    }

    /**
     * Crear artiuclos a través del formulario.
     */
    public function store(Request $request)
    {
        

        //Antes de guardar en la BD se hacen validaciones.
        
        $request->validate([
            'title' => 'required', 
            'content' => 'required',
            'readers' => 'required|numeric',
            'journalist_id' => 'required|exists:journalists,id'
        ]);

        $a = new Article($request->all());

        $a->save();
        return redirect()->route('article.index');
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
    public function edit(Article $article)
    {
        //$article = Article::find($id);
        //Log::channel('stderr')->info('mensaje', [$article, $id]);
        return view('article.edit', compact("article"));

    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
       $article->title = $request->title;
       $article->readers = $request->readers;
       $article->content = $request->content;

       $article->update();
        //return view('article.show', compact("article"));

        return redirect()->route('article.index')->with('success', 'Se ha actualizado');

       
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $message = "Artículo:  " . $article->title . " eliminado";

        return  redirect()->route('article.index')->with('delete' , $message);


    }
}
