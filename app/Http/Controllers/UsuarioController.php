<?php 
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class UsuarioController extends Controller {

    public function cadastro(){
        
        return view('usuario.cadastroUsuario');
    }

    public function realizar_cadastro(){
        
        return view('usuario.cadastroUsuario');
    }

    public function excluir(){
        
        return view('usuario.cadastroUsuario');
    }

}