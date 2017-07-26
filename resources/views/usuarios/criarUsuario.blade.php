 @include('layouts.head')



<div class="container" id="espaçamentoinicial_criar">

    {{-- Apresentação de erros de validação --}}
             @include('inc.erros') 

 
                        
  {{--====================================================================--}}
    <div class="form_user_new">
        <h4 class="text-center" id="criar">Criar Conta</h4>

        
            <form action="/executa_criar" method="post">
                {{-- CSRF --}}
                {{csrf_field() }}
                <label>Usuario</label>
                    <input type="text" class="form-control" name="text_usuario" id="text_usuario" placeholder="Usuario" >
                <label>Email</label>
                    <input type="text" class="form-control" name="text_email" id="text_email" placeholder="Email" >
                <label>Senha</label>
                    <input type="password" class="form-control" name="text_senha" id="text_senha" placeholder="Senha" >
                <label>Repetir</label>
                    <input type="password" class="form-control" name="text_repetirSenha" id="text_repetirSenha" placeholder="Repetir a senha" >
                
                    <input type="checkbox"  name="text_termo" id="termo" value="1" ><label for="termo"> Termo de Usuario.</label>
                
                <p class="text-center">
                    <button><a href="/">Cancelar</a></button>
                    <button type="submit" value="Criar"><i class="fa fa-sign-in"></i>Criar</button>
                </p>

            </form>
    </div>                 
</div>
@include('layouts.footer')


        


