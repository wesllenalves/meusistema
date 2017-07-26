<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    //
    public function index(){
        //verifica se exixte sessao se existir redireciona para perfil
        if(Session::has('login')){
        return redirect('/perfil');
    }else{
        //Se não existe sessao e redirecionado para a pagina inicial
        return view('home');
        }
    }
}
