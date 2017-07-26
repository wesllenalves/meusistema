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

Route::get('/', 'Homecontroller@index');
Route::get('/home', 'Homecontroller@index');

//Route::get('Pagseguro', 'PagseguroController@Pagseguro');
Route::get('pagamento', 'PagseguroController@Pagseguro');
Route::get('notificacao', 'PagseguroController@Notificacao');



/*Usuarios*/
Route::get ('/criar', 'UsuariosController@IndexCriarUsuario');
Route::post ('/executa_criar', 'UsuariosController@ExecutaCriarUsuario');
Route::get ('/recuperar', 'UsuariosController@IndexRecuperarSenha');
Route::post ('/executa_recuperar', 'UsuariosController@ExecutarRecuperarSenha');
Route::get ('/login', 'UsuariosController@IndexLogin');
Route::post ('/executar_login', 'UsuariosController@ExecutaLogin');
/*Fim Usuarios*/

/*Perfil*/
Route::get ('/perfil_logout', 'contaUserController@logout');
Route::get ('/perfil', 'contaUserController@contaUserIndex');
/*Fim Perfil*/