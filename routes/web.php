<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\segurancaController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/area_admin/{funcao}', function ($funcao) {
    $service = app(segurancaController::class);
    $seguranca = $service->seguranca();
    $financas = DB::table('financeiro')->get();
    if($seguranca === 1){
        return view('admin_view',['funcao'=>$funcao,'msg'=>false,'financas'=>$financas]);
    }else{
        return redirect()->route('login');
    }
})->name('area_admin');

Route::get('/area_moderador/{funcao}', function () {
    $service = app(segurancaController::class);
    $seguranca = $service->seguranca();
    if($seguranca === 1){
        $financas = DB::table('financeiro')->get();
        return view('moderador_view',['financas'=>$financas]);
    }else{
        return redirect()->route('login');
    }
})->name('area_moderador');

Route::get('/area_financeiro/{funcao}', function () {
    $service = app(segurancaController::class);
    $seguranca = $service->seguranca();
    if($seguranca === 1){
        $financas = DB::table('financeiro')->get();
        return view('financeiro_view',['financas'=>$financas]);
    }else{
        return redirect()->route('login');
    }
})->name('area_financeiro');

Route::get('/sair', function () {
    $service = app(segurancaController::class);
    return $service->sair();    
})->name('sair');

Route::post('/login', [LoginController::class, 'loginUser'])->name('users.login');

