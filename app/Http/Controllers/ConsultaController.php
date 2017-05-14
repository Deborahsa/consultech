<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class ConsultaController extends Controller
{
    public function consulta(){


        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where descricao LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $consultas = DB::select("SELECT * FROM `sala`  order by id_sala");

        return view('consulta.consulta')->with("consultas",$consultas);
    }

    public function realizar_cadastro(){
        $id_sala = Request::input("id_sala");
        $descricao = Request::input("descricao");

        if ($id_sala) {
            DB::update("update sala set descricao = '".$descricao."' where id_sala = ".$id_sala."");
        }else{
            DB::insert('insert into sala (descricao) values (?)', array($descricao));   
        }

        return redirect('/consultas');
    }
    public function excluir(){
        $id = Request::input('id_sala');
        DB::delete('delete from sala where id_sala = ?', [$id]);

        return redirect('/consultas');
    }
    
} 