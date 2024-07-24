<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/todo")->controller(TodoController::class)->name("Todo.")->group(
    function () {
        Route::get('', "show")->name("show");
        Route::get('{todo}/edit', "editpage")->name("edit");
        Route::post('{todo}/edit', "edit");
        Route::get('{todo}' , "chageState")->name("chageState");

        Route::delete('{todo}/delete' , "delete")->name("delete");
        Route::get('{todo}/delete' , "delete")->name("delete");
        
        Route::post('', "store")->name("show");
        Route::get('{todo}/informations', "info")->name("info");

        Route::get("/faite" , "paginatefait")->name("paginatefait");
        Route::get("/nonfait" , "paginatenonfait")->name("paginatenonfait");
        Route::get("/faitounon" , "paginate")->name("paginate"); 
    }
);