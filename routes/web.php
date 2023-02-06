<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');


//Route::get('posts', [PostController::class, 'index'])->name('posts_listado');


/**Ejercicio2
*En el proyecto de blog anterior, agrega estos dos cambios:
*Una nueva ruta parametrizada a posts/{id}, de modo que el parámetro id sea numérico (es decir, solo contenga dígitos del 0 al 9) y sea obligatorio. Haz que la ruta devuelva el mensaje "Ficha del post XXXX", donde XXXX es el id recibido como parámetro.
*Un nombre a las tres rutas que se han definido hasta ahora: la página de inicio ponle el nombre "inicio", la que tiene la lista llámala "posts_listado" y la que tiene los detalles, que acabas de crear, llámala "posts_ficha".
*/
/*
Route::get('posts/{id}',function($id){
    //return "Ficha del post $id";
    return view('posts.ficha',compact('id'));
})->where('id', "[0-9]+")->name('posts_ficha');
*/

//Route::get('posts/{id}', [PostController::class, 'show'])->where('id', "[0-9]+")->name('posts_ficha');


//Route::get('posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('add_prueba');

//Route::get('posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('edit_prueba');



/*
Route::resources([
    'posts' => ClienteController::class,
    'xxx' => XXXXController::class
]);
*/

Route::resource('posts', PostController::class);


/*

javi@MacBook-Pro-de-Javier Posts-main % php artisan route:list
+--------+-----------+---------------------+---------------+------------------------------------------------------------+------------------------------------------+
| Domain | Method    | URI                 | Name          | Action                                                     | Middleware                               |
+--------+-----------+---------------------+---------------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD  | /                   | inicio        | Closure                                                    | web                                      |
|        | GET|HEAD  | api/user            |               | Closure                                                    | api                                      |
|        |           |                     |               |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | posts               | posts.index   | App\Http\Controllers\PostController@index                  | web                                      |
|        | POST      | posts               | posts.store   | App\Http\Controllers\PostController@store                  | web                                      |
|        | GET|HEAD  | posts/crear         | posts.create  | App\Http\Controllers\PostController@create                 | web                                      |
|        | GET|HEAD  | posts/{post}        | posts.show    | App\Http\Controllers\PostController@show                   | web                                      |
|        | PUT|PATCH | posts/{post}        | posts.update  | App\Http\Controllers\PostController@update                 | web                                      |
|        | DELETE    | posts/{post}        | posts.destroy | App\Http\Controllers\PostController@destroy                | web                                      |
|        | GET|HEAD  | posts/{post}/editar | posts.edit    | App\Http\Controllers\PostController@edit                   | web                                      |
|        | GET|HEAD  | sanctum/csrf-cookie |               | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                      |
+--------+-----------+---------------------+---------------+------------------------------------------------------------+------------------------------------------+
*/
