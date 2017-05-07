<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
 
class PacienteController extends Controller
{
    public function paciente(){
        $busca = Request::input('busca');

        if (!empty($busca)) {
            $where = "where nome_paciente LIKE '%".$busca."%'";
        }else {
            $where = '';
        }

        $pacientes = DB::select("select * from paciente ".$where." order by nome_paciente");
        return view('pacientes.paciente')->with('pacientes', $pacientes);

    }

    public function realizar_cadastro(){

        $id_paciente    = Request::input('id_paciente');

        $nome_paciente  = Request::input('nome_paciente');
        $dt_nascimento  = Request::input('dt_nascimento');
        $endereco       = Request::input('endereco');
        $bairro         = Request::input('bairro');
        $cidade         = Request::input('cidade');
        $uf             = Request::input('uf');
        $nome_mae       = Request::input('nome_mae');
        $nome_pai       = Request::input('nome_pai');
        $telefone       = Request::input('telefone');
        $celular        = Request::input('celular');
        $cpf            = Request::input('cpf');
        $rg             = Request::input('rg');
        $orgao_emissor  = Request::input('orgao_emissor');
        $dt_emissao     = Request::input('dt_emissao');
        $sexo           = Request::input('sexo');
        $estado_civil   = Request::input('estado_civil');
        $dt_cadastro    = Request::input('dt_cadastro');

        $dt_nascimento = PacienteController::inverteData($dt_nascimento);
        $dt_emissao = PacienteController::inverteData($dt_emissao);
        $dt_cadastro = PacienteController::inverteData($dt_cadastro);

    
        if (empty($id_paciente)) {
            DB::insert("INSERT INTO `paciente`(`nome_paciente`, `dt_nascimento`, `endereco`, `bairro`, `cidade`, `uf`, `nome_mae`, `nome_pai`, `telefone`, `celular`, `cpf`, `rg`, `orgao_emissor`, `dt_emissao`, `sexo`, `estado_civil`, `dt_cadastro`) VALUES ('".$nome_paciente."', '".$dt_nascimento."', '".$endereco."', '".$bairro."', '".$cidade."', '".$uf."', '".$nome_mae."', '".$nome_pai."', '".$telefone."', '".$celular."', '".$cpf."', '".$rg."', '".$orgao_emissor."', '".$dt_emissao."', '".$sexo."', '".$estado_civil."', '".$dt_cadastro."')");

        }else{
            DB::update("UPDATE `paciente` SET `nome_paciente`='".$nome_paciente."',`dt_nascimento`='".$dt_nascimento."',`endereco`='".$endereco."',`bairro`='".$bairro."',`cidade`='".$cidade."',`uf`='".$uf."',`nome_mae`='".$nome_mae."',`nome_pai`='".$nome_pai."',`telefone`='".$telefone."',`celular`='".$celular."',`cpf`='".$cpf."',`rg`='".$rg."',`orgao_emissor`='".$orgao_emissor."',`dt_emissao`='".$dt_emissao."',`sexo`='".$sexo."',`estado_civil`='".$estado_civil."',`dt_cadastro`='".$dt_cadastro."' WHERE `id_paciente`= ".$id_paciente."");
        }

        return redirect('/pacientes');
    }   
    public function excluir(){
        $id_paciente = Request::input('id_paciente');

        DB::delete("delete from paciente where id_paciente = ".$id_paciente."");

        return redirect('/pacientes');
    }

    static function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }
    
} 
