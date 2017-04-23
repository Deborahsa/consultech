<?php 
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class UsuarioController extends Controller {


    public function cadastro(){

        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where nome LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $usuarios = DB::select("select * from usuario ".$where." order by nome");
        return view('usuario.cadastroUsuario')->with('usuarios', $usuarios);
    }

    public function realizar_cadastro(){
        $funcionario = Request::input('funcionario');
        $data = Request::input('data');
        $nome = Request::input('nome');
        $funcao = Request::input('funcao');
        $login = Request::input('login');
        $senha = Request::input('senha');
        $ativo = Request::input('situcao');

        $id_usuario = Request::input('id_usuario');

        if (empty($id_usuario)) {
            DB::insert('insert into usuario (`id_funcionario`, `data`, `nome`, `funcao`, `login`, `senha`, `ativo`) 
                values (?, ?, ?, ?, ?, ?, ?)', array($funcionario, $data, $nome, $funcao, $login, $senha, $ativo));
        }else{
            DB::update("UPDATE `usuario` SET `id_funcionario`= ".$funcionario.",`data`='".$data."',`nome`='".$nome."',
                `login`='".$login."',`senha`='".$senha."',`ativo`=".$ativo.",`funcao`='".$funcao."' 
                WHERE id_usuario = ".$id_usuario."");            
        }
        return redirect('/usuarios');
    }

    public function excluir(){

        $id = Request::input('id_usuario');
        DB::delete('delete from usuario where id_usuario = ?', [$id]);

        return redirect('/usuarios');
    }

}