<?php 
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class UsuarioController extends Controller {


    public function cadastro(){

        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where f.nome LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $funcionarios = DB::select("SELECT `id_funcionario`,`nome` FROM `funcionario` WHERE `ativo` = 0  order by nome");

        $usuarios = DB::select("SELECT u.*, f.nome, f.id_funcao FROM `usuario` as u JOIN funcionario as f on u.id_funcionario = f.id_funcionario ".$where." order by f.nome");
        return view('usuario.cadastroUsuario')->with(array('usuarios' => $usuarios, 'funcionarios' => $funcionarios));
    }

    public function realizar_cadastro(){
        $id_usuario = Request::input('id_usuario');
        $id_funcionario = Request::input('id_funcionario');
        $login = Request::input('login');
        $senha = Request::input('senha');


        if (empty($id_usuario)) {
            DB::insert('INSERT INTO `usuario`(`id_funcionario`, `login`, `senha`) 
                values (?, ?, ?)', array($id_funcionario, $login, $senha));
        }else{
            DB::update("UPDATE `usuario` SET `id_funcionario`= ".$id_funcionario.",`login`='".$login."',`senha`='".$senha."' 
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