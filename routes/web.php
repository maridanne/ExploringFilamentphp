<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $users = DB::select("select * from users");

    // $user = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['Marie', 'mariekoy@gmail.com', 'monalisa']);
    // $user = DB::update("update users set email='monalisa@gmail.com' where id=2");
    // $user = DB::delete('delete from users where id=2');
    dd($users);
});
