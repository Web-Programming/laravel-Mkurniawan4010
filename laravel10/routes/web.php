<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Buat rutes ke halaman profil
Route::get('/profil',function () {
    return view("profil");
});
  
//route dengan parameter
Route::get("/Mahasiswa2/{nama?}",function($nama = "wawan"){
    echo "<h1>Halo Nama Saya $nama</h2>";
});

//Route dengan parameter > 1
Route::get("/profil/{nama?}/{pekerjaan?}",function($nama = "wawan",$pekerjaan ="Mahasiswa"){
    echo "<h1>Hallo Nama Saya $nama, Saya Adalah $pekerjaan</h2>";
});

//Redirect dan named route
Route::get("/hubungi",function(){
    echo "<h1>hubungi Kami<h1>";
})->name("call"); //named route

Route::redirect("/contact","/hubungi");

Route::get("/halo",function(){
    echo "<a href= '".route('call') . "'>".route('call')."<a>";
});

Route::prefix("/dosen")->group(function(){
    Route::get("/jadwal",function(){
        echo "<h1>Jadwal Dosen </h1>";
    });
    Route::get("/materi",function(){
        echo "<h1>Materi Perkuliahan </h1>";
    });
    //dan lain lain
});

