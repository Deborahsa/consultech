<?php 
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class UsuarioController extends Controller {

    public function cadastro(){
        
        return view('usuario.cadastroUsuario');
    }

    public function realizar_cadastro(){
        $funcionario = Request::input('funcionario');
        $data = Request::input('data');
        $nome = Request::input('nome');
        $funcao = Request::input('funcao');
        $login = Request::input('login');
        $senha = Request::input('senha');
        $ativo = Request::input('situcao');
        DB::insert('insert into usuario (`id_funcionario`, `data`, `nome`, `funcao`, `login`, `senha`, `ativo`) 
            values (?, ?, ?, ?, ?, ?, ?)', array($funcionario, $data, $nome, $funcao, $login, $senha, $ativo));
        return redirect('/index');
    }

    public function excluir(){
        
        return view('usuario.cadastroUsuario');
    }

}