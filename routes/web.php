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

//Paciente 
Route::get('/pacientes', 'PacienteController@paciente');
Route::post('/pacientes/novo', 'PacienteController@realizar_cadastro')->name('cadastro_paciente');
Route::get('/pacientes/excluir', 'PacienteController@excluir')->name('excluir_paciente');

//Função->Cargo do Funcionário
Route::get('/funcoes','FuncaoController@funcao');
Route::post('/funcoes/novo', 'FuncaoController@realizar_cadastro')->name('cadastro_funcao');
Route::get('/funcoes/excluir', 'FuncaoController@excluir')->name('excluir_funcao');


//Especialidades
Route::get('/especialidades','EspecialidadeController@especialidade');
Route::post('/especialidades/novo', 'EspecialidadeController@realizar_cadastro')->name('cadastro_especialidade');
Route::get('/especialidades/excluir', 'EspecialidadeController@excluir')->name('excluir_especialidade');

//Salas
Route::get('/salas','SalaController@sala');
Route::post('/salas/novo', 'SalaController@realizar_cadastro')->name('cadastro_sala');
Route::get('/salas/excluir', 'SalaController@excluir')->name('excluir_sala');

//consultas
Route::get('/consultas','ConsultaController@consulta');