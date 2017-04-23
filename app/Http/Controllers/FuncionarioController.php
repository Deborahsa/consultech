<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class funcionarioController extends Controller
{
    public function funcionario(){
        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where nome LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $funcionarios = DB::select("select * from funcionario ".$where." order by nome");
        return view('funcionario.funcionario')->with('funcionarios', $funcionarios);

    }

    public function realizar_cadastro(){
        $nome           = Request::input('nome');
        $data_nacimento = Request::input('data_nacimento');
        $endereco       = Request::input('endereco');
        $bairro         = Request::input('bairro');
        $cidade         = Request::input('cidade');
        $numero         = Request::input('numero');
        $telefone       = Request::input('telefone');
        $cpf            = Request::input('cpf');
        $rg             = Request::input('rg');
        $admissao       = Request::input('admissao');
        $funcao         = Request::input('funcao');
        $hora_trabalho  = Request::input('hora_trabalho');
        $crm            = Request::input('crm');
        $ativo          = Request::input('situcao');
        $id_funcionario = Request::input('id_funcionario');

        $arrayName = array($nome, $data_nacimento, $endereco, $bairro, $cidade, $numero, $telefone, $cpf,$rg, $admissao, $funcao, $hora_trabalho, $crm, $ativo);

        if (empty($id_funcionario)) {

            DB::insert('insert into `funcionario`(`nome`, `data_nacimento`, `endereco`, `bairro`, `cidade`, `numero`, `telefone`, `cpf`, `rg`, `admissao`, `funcao`, `horario_trabalho`, `crm`, `ativo`) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $arrayName);
        }else{
            DB::update("UPDATE `funcionario` SET `nome`='".$nome."', `data_nacimento`='".$data_nacimento."', `bairro`='".$bairro."', endereco='".$endereco."', `cidade`='".$cidade."',`numero`='".$numero."',`telefone`='".$telefone."',`cpf`='".$cpf."',`rg`='".$rg."',`admissao`='".$admissao."',`funcao`='".$funcao."',`horario_trabalho`='".$hora_trabalho."',`crm`='".$crm."',`ativo`='".$ativo."' WHERE id_funcionario = ".$id_funcionario."");            
        }
        return redirect('/funcionarios');

    }
    public function excluir(){

        $id = Request::input('id');
        DB::delete('delete from funcionario where id_funcionario = ?', [$id]);

        return redirect('/funcionarios');
    }
} 
