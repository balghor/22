<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){});

Route::resource("/project","ProjectsController");

Route::get("/add2album","AlbumModifyController@album_page")->name('add2album');

Route::post("/add2album/create","AlbumModifyController@add2album")->name("album_create");

Route::prefix("ajax")->group(function (){
    Route::get("load_project","AjaxController@LoadProject")->name("load_project_id");
});
