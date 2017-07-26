<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Illuminate\Support\Facades\Hash;
use Session;
use App\classes\geradorSenha;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailRecuperarSenha;

class UsuariosController extends Controller
{
    //===================================================================================
    //LOGIN
    //===================================================================================
    public function IndexLogin(){
        //Apresenta a pagina de criar novo Usuario
        return view('usuarios.login');
    }

    public function ExecutaLogin(Request $request){
        //Executa o formulario de Login e verificações
        
        //Validação
        $this->validate($request, [
            'text_email' => 'required',
            'text_senha' => 'required'
        ]);

        //Verifica se Existe Usuario
        $usuario= usuarios::where('email', $request->text_email)->first();
        //verifica se encontou algum usuario
        if(count($usuario) == 0){
            
            $erros_bd = ['Email Incorreto'];
            
            return view('usuarios.login', compact('erros_bd'));
            
        }
        //Verificação da senha
        if(!Hash::check($request->text_senha, $usuario->senha)){
            $erros_bd = ['Senha incorreta'];
            
            return view('usuarios.login', compact('erros_bd'));
        }
        //Criar Sessao de usuario
        Session::put('login', 'sim');
        Session::put('usuario', $usuario->usuario);

        return redirect('/home');
    }//==================================================================================

    //===================================================================================
    //CRIAR NOVO USUARIO
    //===================================================================================
    public function IndexCriarUsuario(){
        //Apresenta a pagina de criar novo Usuario
        return view('usuarios.criarUsuario');
    }

    public function ExecutaCriarUsuario(Request $request){
        //Executa o formulario de novo Usuario e verificações
        
        //Validação -----------------------------------------------
        $this->validate($request, [
            'text_usuario' => 'required|between:4,30',
            'text_email' => 'required|email',
            'text_senha' => 'required|between:6,16',
            'text_repetirSenha' => 'required|same:text_senha',
            'text_termo' => 'accepted'
        ]);
        //---------------------------------------------------------
        //Verifica se existe o mesmo email e a mesma senha --------
        $dados = usuarios::where('usuario', '=', $request->text_usuario)
                ->orWhere('email', '=', $request->text_email)
                ->get();
        if($dados->count() != 0){
            $erros_bd = ['Já existe um usuario com o mesmo nome ou o mesmo email !'];
            return view('usuarios.criarUsuario', compact('$erros_bd'));
        }
        //---------------------------------------------------------
        //Inserir novo usuario na base de dados -------------------
        $novo = new usuarios;
        $novo->usuario = $request->text_usuario;
        $novo->email = $request->text_email;
        $novo->senha = Hash::make($request->text_senha);
        $novo->save();

        return redirect('/login');
        
    }//==================================================================================
    

    //===================================================================================
    //RECUPERAR SENHA
    //===================================================================================
    public function IndexRecuperarSenha(){
        //Apresenta a pagina de recuperação de senha
        return view('usuarios.recuperarSenha');
    }

    public function ExecutarRecuperarSenha(Request $request){
        //Executa o formulario de recuperação de senha e verificações
        
        $this->validate($request, [
            
            'text_email' => 'required|email',
            
        ]);
        //verifica na base de dados se existe esse email inserido no formulario
        $usuario = usuarios::where('email', $request->text_email)->get();
        if($usuario->count() == 0){
            $erros_bd = ['Email não está cadastrado ou não foi encontrado na base de dados.'];
            return view('usuarios.recuperarSenha', compact('erros_bd'));
        }
        //atualizar senha no banco de dados(senha repurerada)
        $usuario = $usuario->first();
        //Cria uma nova senha aleatoria
        $nova_senha = geradorSenha::criarCodigo();
        $usuario->senha = Hash::make($nova_senha);
        $usuario->save();
        //Enviar Email ao usuario com a nova senha
        Mail::to($usuario->email)->send(new emailRecuperarSenha($nova_senha));
        
        return $nova_senha;
    }//==================================================================================
}
