<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class PacienteController extends Controller
{
    public function paciente(){
    	return view('pacientes.paciente');
    }

    public function realizar_cadastro(){

    }
    public function excluir(){
        
    }
    
} 
