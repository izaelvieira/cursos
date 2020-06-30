<?php

use Illuminate\Support\Facades\Route;

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

/* rota default */
Route::get('/', 'LoginController@index');

 /* rota de login */
Route::post('/fazer_login', 'LoginController@fazerLogin');

 /* rota de logout */
Route::get('/fazer_logout','LoginController@fazerLogout');

/* rotas de recuperar senha*/
Route::get('/recuperar_senha','LoginController@frmRecuperarSenha');
Route::post('/executar_recuperar_senha', 'LoginController@recuperarSenha');

/* rotas de novo aluno */
Route::get('/registrar_aluno','AlunosController@frmRegistrarAluno');
Route::post('/salvar_registro_aluno', 'AlunosController@salvarRegistroAluno');
Route::get('/novo_aluno','AlunosController@frmInserirAluno');
Route::post('/inserir_aluno','AlunosController@inserirAluno');
Route::get('/editar_aluno/{id}','AlunosController@frmEditarAluno');
Route::put('/salvar_aluno/{id}', 'AlunosController@salvarAluno');
Route::get('/visualizar_aluno/{id}','AlunosController@frmVisualizarAluno');
Route::post('/inativar_aluno/{id}', 'AlunosController@inativarAluno');
Route::post('/carregar_foto', 'AlunosController@carregarFoto');
Route::post('/pesquisar_aluno', 'AlunosController@pesquisarAluno');
Route::post('/adicionar_curso_aluno/{id}', 'AlunosController@adicionarCurso');
//Route::post('/deletar_curso_aluno/{id}/{aluno_id}', 'AlunosController@deletarCursoAluno');
Route::delete('/deletar_curso_aluno/{id}/{aluno_id}', 'AlunosController@deletarCursoAluno');

/* rotas dos Cursos */
Route::get('/visualizar_curso/{id}','CursosController@frmVisualizarCurso');
Route::get('/novo_curso','CursosController@frmInserirCurso');
Route::get('/editar_curso/{id}','CursosController@frmEditaCurso');
Route::put('/salvar_curso/{id}', 'CursosController@salvarCurso');
Route::post('/inserir_curso','CursosController@inserirCurso');
   /* rota para deletar , porem foi preferido inativar o item*/
  //Route::delete('/inativar_curso/{id}', 'CursosController@inativarCurso');
Route::post('/inativar_curso/{id}', 'CursosController@inativarCurso');
Route::post('/importar_xml', 'CursosController@importarXml');
Route::post('/pesquisar_curso', 'CursosController@pesquisarCurso');

/* rotas Menu Principal*/
Route::get('/menu_principal','aplicacaoController@index');
Route::get('/lista_cursos','cursosController@frmListaCursos');
Route::get('/lista_alunos','alunosController@frmListaAlunos');