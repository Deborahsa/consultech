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

        $id_funcionario     = Request::input('id_funcionario');
        $nome               = Request::input('nome');
        $dt_nascimento      = Request::input('dt_nascimento');
        $cep                = Request::input('cep');
        $endereco           = Request::input('endereco');
        $bairro             = Request::input('bairro');
        $cidade             = Request::input('cidade');
        $uf                 = Request::input('uf');
        $numero             = Request::input('numero');
        $nome_mae           = Request::input('nome_mae');
        $nome_pai           = Request::input('nome_pai');
        $telefone           = Request::input('telefone');
        $celular            = Request::input('celular');
        $cpf                = Request::input('cpf');
        $rg                 = Request::input('rg');
        $orga_emissor       = Request::input('orga_emissor');
        $sexo               = Request::input('sexo');
        $estado_civil       = Request::input('estado_civil');
        $dt_adimissao       = Request::input('dt_adimissao');
        $id_funcao          = Request::input('id_funcao');
        $carga_horaria      = Request::input('carga_horaria');
        $CRM                = Request::input('CRM');
        $id_especialidade   = Request::input('id_especialidade');
        $ativo              = Request::input('ativo');
        
        //convertendo datas
        $dt_nascimento  = funcionarioController::inverteData($dt_nascimento);
        $dt_adimissao   = funcionarioController::inverteData($dt_adimissao);

        $arrayFuncionario = array($nome, $dt_nascimento, $cep, $endereco, $bairro, $cidade, $uf,$numero, $nome_mae, $nome_pai, $telefone ,$celular, $cpf, $rg, $orga_emissor, $sexo, $estado_civil, $dt_adimissao ,$id_funcao ,$carga_horaria, $CRM, $id_especialidade, $ativo);

        if (empty($id_funcionario)) {

            DB::insert('INSERT INTO `funcionario`(`nome`, `dt_nascimento` , `cep`,`endereco`, `bairro`, `cidade`, `uf`, `numero`,`nome_mae`, `nome_pai`, `telefone`, `celular`, `cpf`, `rg`, `orga_emissor`, `sexo`, `estado_civil`, `dt_adimissao`, `id_funcao`, `carga_horaria`, `CRM`, `id_especialidade`, `ativo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $arrayFuncionario);
        }else{
            DB::update("UPDATE `funcionario` SET `nome`='".$nome."',`endereco`='".$endereco."',`dt_nascimento`='".$dt_nascimento."',`bairro`='".$bairro."',`cidade`='".$cidade."',`uf`='".$uf."',`nome_mae`='".$nome_mae."',`nome_pai`='".$nome_pai."',`telefone`='".$telefone."',`celular`='".$celular."',`cpf`='".$cpf."',`rg`='".$rg."',`orga_emissor`='".$orga_emissor."',`sexo`='".$sexo."',`estado_civil`='".$estado_civil."',`dt_adimissao`='".$dt_adimissao."',`carga_horaria`='".$carga_horaria."',`CRM`='".$CRM."',`id_funcao`='".$id_funcao."',`id_especialidade`='".$id_especialidade."',`ativo`='".$ativo."',`cep`='".$cep."',`numero`='".$numero."' WHERE id_funcionario = ".$id_funcionario."");            
        }
        return redirect('/funcionarios');

    }
    public function excluir(){

        $id = Request::input('id');
        DB::delete('delete from funcionario where id_funcionario = ?', [$id]);

        return redirect('/funcionarios');
    }

    static function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }
} 
