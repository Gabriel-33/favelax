<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController
{
    public function loginUser(Request $request)
    {
        $credentials = [
            'email_user' => $request->input('email'),
            'senha_user' => $request->input('senha'),
        ];

        $user = DB::table('usuario')->where($credentials)->get();

        if ($user->count() > 0) {
            // Authentication successful
            $token = sha1(date('Y-m-d H:i:s'));
            session(['token_sessao' => $token]);
            DB::table('usuario')->where('id_user', $user[0]->id_user)->update(['token' => $token]);
            switch($user[0]->status){
                case 1:
                    return redirect()->route('area_admin', ['funcao' => 'cadastrar_financa']);
                break;
                case 2:
                    return redirect()->route('area_moderador', ['funcao' => 'listar_financa']);
                break;
                case 3:
                    return redirect()->route('area_financeiro', ['funcao' => 'listar_financa']);
                default:
                    return redirect()->route('area_financeiro', ['funcao' => 'listar_financa']);
                break;
            }
        } else {
            return view('login',['erroLogin'=>true]);
        }
    }
}
