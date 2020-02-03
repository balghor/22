<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
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

Route::get('/', "HomeController@HomeIndex")->name("Home");
Route::get('/project_show/{id}', "HomeController@project")->name("projectShow");


Route::get("/login", "LoginController@ShowLogin")->name("show_login");
Route::post("/doing_login", "LoginController@DoLogin")->name("doing");

//vip login

Route::get("/vip_login", "LoginController@ShowLoginVIP")->name("show_login_vip");
Route::post("/vip_doing_login", "LoginController@DoLoginVIP")->name("doing_vip");

Route::get("/logout", "LoginController@logout")->name("logout");

Route::middleware("Dologin")->group(function () {
    Route::get("/dashboard", "LoginController@ShowDashboard")->name("dashboard");
    Route::get("/change_password", "LoginController@changePassowrdShow")->name("change_password_show");
    Route::post("/set_new_password", "LoginController@changePassowrd")->name("set_password");

    Route::resource("/project", "ProjectsController");

    Route::resource("/user", "UsersController");
    Route::resource("/media", "MediasController");

    Route::get("/add2album/{id}", "AlbumModifyController@album_page")->name('add2album');

    Route::post("/add2album/create", "AlbumModifyController@add2album")->name("album_create");

    Route::prefix("ajax")->group(function () {
        Route::get("load_project", "AjaxController@LoadProject")->name("load_project_id");
        Route::get("delete_file", "AjaxController@delete_file")->name("delete_file");
    });
});
