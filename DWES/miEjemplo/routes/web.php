<?php

use App\Models\Receta;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('welcome');
});

Route::get('/receta/{id}', function (int $id){
    return view('receta')->with('receta',Receta::find($id));
})->where('id', '[0-9]+')->middleware('auth');

Route::get('/recetas', function (){
    return view('recetas')->with('recetas',Receta::all());
})->middleware('auth');
Route::get('/recetas/{categoria}', function (string $categoria){
    return view('recetas')->with('recetas',(Receta::where('tipo',$categoria)->get()));
})->whereIn('categoria',['tradicional','slowcook','freidora'])->middleware('auth:admin');

Route::get('/registro', function(){
    return view('registro');
});
Route::post('/registro',[UserController::class,"create"]);

Route::get('/perfil',[UserController::class,"verPerfil"])->middleware('auth');

Route::get('/login', function(Request $request){
    //Si el usuario no esta logeado, al login. Si lo esta, al perfil.
    return is_null($request->user()) ? view('login') : redirect('perfil');
})->name('login');
Route::post('/login',[UserController::class,"login"]);


