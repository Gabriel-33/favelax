<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancaController extends Controller{
    public function cadastrarFinanca(Request $dados){
        $inserirFinanca = DB::table('financeiro')->insert([
            'valor' => $dados->valor,
            'descricao' => $dados->descricao
        ]);
        
        if ($inserirFinanca) {
            return view('admin_view', ['funcao' => 'cadastrar_financa','msg'=>'ok','msg'=>'Finança cadastrada!','classeAlert'=>'text-bg-success']);
        } else {
            return view('admin_view', ['funcao' => 'cadastrar_financa','msg'=>'erro','msg'=>'Erro ao cadastrar finança!','classeAlert'=>'text-bg-warning']);
        }
    }
    public function editarFinanca(Request $dados){
        $atualizar_financa = DB::table('financeiro')->where('id_financeiro',  $dados->id_financa)->update([
            'descricao' => $dados->financa,
            'valor' => $dados->valor_financa,
        ]);
        if($atualizar_financa){
            return redirect()->route("{$dados->area}", ['funcao' => 'listar_financas']);
        }else{
            return redirect()->route("{$dados->area}", ['funcao' => 'listar_financas']);
        }
    }
    public function excluirFinanca(Request $dados){
        $excluir_financa = DB::table('financeiro')->where('id_financeiro','=',$dados->id_financeiro)->delete();
        if($excluir_financa){
            return 1;
        }else{
            return 0;
        }
    }
}
