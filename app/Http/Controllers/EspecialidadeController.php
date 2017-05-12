<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class especialidadeController extends Controller
{
    public function especialidade(){


        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where descricao LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $especialidades = DB::select("SELECT * FROM `especialidade` ".$where." order by id_especialidade");

        return view('especialidade.especialidade')->with("especialidades",$especialidades);
    }

    public function realizar_cadastro(){
        $id_especialidade = Request::input("id_especialidade");
        $descricao = Request::input("descricao");

        if ($id_especialidade) {
            DB::update("update especialidade set descricao = '".$descricao."' where id_especialidade = ".$id_especialidade."");
        }else{
            DB::insert('insert into especialidade (descricao) values (?)', array($descricao));   
        }

        return redirect('/especialidades');
    }
    public function excluir(){
        $id = Request::input('id_especialidade');
        DB::delete('delete from especialidade where id_especialidade = ?', [$id]);

        return redirect('/especialidades');
    }
    
} 