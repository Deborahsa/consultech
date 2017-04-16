<?php
namespace consultech\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logout(){
        return view('login');
    }
} 
