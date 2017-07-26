<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class contaUserController extends Controller
{
    //===================================================================================
    //Perfil de Usuario
    //===================================================================================
    public function contaUserIndex(){
    //Verifica se existe a sessao de login
        if(!Session::has('login')){
            return redirect('/');
        }
    //Apresenta o interior da pagina de perfil se existir a sessao
        return view('usuarios.perfil.perfil-user');
    }
    //===================================================================================

    //===================================================================================
    //Logout
    //===================================================================================
    public function logout(){
    //Destroi a sessao
    Session::flush();
    return redirect('/home');
    }
}
