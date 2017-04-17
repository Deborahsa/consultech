<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function logar(){
        $login = Request::input('login');
        $senha = Request::input('senha');
        $resultado = DB::select('select * from usuario where login = ? and senha = ?', array($login,$senha));
        if ($resultado) {

            return redirect('/index');
        }else{
            return view('login')->with('erro','<p class="alert alert-danger">Login ou Senha incorreto!</p>');    
        }
        
    }

    public function logout(){
        return redirect('/login');
    }
} 
