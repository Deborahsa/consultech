<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function(){
    return view('index');
});

Route::get('/login', 'LoginController@login');

Route::post('/logar', 'LoginController@logar');

Route::get('/usuarios', 'UsuarioController@cadastro');

Route::post('/usuarios/novo', 'UsuarioController@realizar_cadastro')->name('realizar_cadastro');

Route::get('/usuarios/excluir', 'UsuarioController@excluir')->name('excluir_usuario');

//funcionarios
Route::get('/funcionarios', 'FuncionarioController@funcionario');

Route::post('/funcionarios/novo', 'FuncionarioController@realizar_cadastro')->name('cadastro_funcionario');

Route::get('/funcionarios/excluir', 'FuncionarioController@excluir')->name('excluir_funcionario');
