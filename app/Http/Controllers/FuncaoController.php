<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class funcaoController extends Controller
{
    public function funcao(){


        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where descricao LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $funcoes = DB::select("SELECT * FROM `funcao` ".$where." order by id_funcao");

    	return view('funcao.funcao')->with("funcoes",$funcoes);
    }

    public function realizar_cadastro(){
        $id_funcao = Request::input("id_funcao");
        $descricao = Request::input("descricao");

        if ($id_funcao) {
            DB::update("update funcao set descricao = '".$descricao."' where id_funcao = ".$id_funcao."");
        }else{
            DB::insert('insert into funcao (descricao) values (?)', array($descricao));   
        }

        return redirect('/funcoes');
    }
    public function excluir(){
        $id = Request::input('id_funcao');
        DB::delete('delete from funcao where id_funcao = ?', [$id]);

        return redirect('/funcoes');
    }
    
} 