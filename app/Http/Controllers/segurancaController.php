<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class segurancaController extends Controller{
    public static function seguranca(){
        if(session()->has('token_sessao')){
            return 1;
        }else{
            return 0;
        }
    }
    public static function sair(){
        Session::forget('token_sessao');
        return redirect()->route('login');
    }
}
