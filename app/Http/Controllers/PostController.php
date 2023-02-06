<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comentario;
use App\Http\Requests\PostRequest;

use App\Http\Controllers\Usuario;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Por defecto la consulta ya la devuelve en orden ascendente.
        $posts = Post::orderBy('titulo','ASC')->paginate(5);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {


        $posts = new Post();
        $posts->titulo = $request->get('titulo');
        $posts->contenido = $request->get('contenido');
        $posts->usuario_id = $request->get('usuario');
        $posts->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);
        //cargamos los comentarios asociados al post correspondiente:
        $comentarios = Comentario::where('post_id', $posts->id)->get();
        return view('posts.show', compact('posts', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try{
            $posts = Post::findOrFail($id);
            $posts->titulo = $request->input('titulo');
            $posts->contenido = $request->input('contenido');
            $posts->usuario_id = $request->input('usuario');
            $posts->save();

            return redirect()->route('posts.index');

        }catch(Illuminate\Database\QueryException $e) { }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $posts = Post::findOrFail($id)->delete();
            $comentarios = Comentario::where('post_id', $id)->delete();
            return redirect()->route('posts.index');

        }catch(Illuminate\Database\QueryException $e) { }
    }

    public function nuevoPrueba(){
        try{
            $posts = new Post();
            $posts->titulo = 'titulo'.rand();
            $posts->contenido = 'contenido'.rand();
            $posts->save();

            return redirect()->route('posts.index');

        }catch(Illuminate\Database\QueryException $e) { }

    }

    public function editarPrueba($id){
        try{
            $posts = Post::findOrFail($id);
            $posts->titulo = 'titulo'.rand();
            $posts->contenido = 'contenido'.rand();
            $posts->save();

            return redirect()->route('posts.index');

        }catch(Illuminate\Database\QueryException $e) { }
    }
}
