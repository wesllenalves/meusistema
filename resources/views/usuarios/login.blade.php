{{--Script que faz desaparecer botão login do menu quando aberto a pagina--}}
<script type="text/javascript">
window.onload = initPage;
function initPage(){
    document.getElementById('botao_login').style.display = 'none';
}
</script>
{{--====================================================================--}}

@include('layouts.head')



       
        
<div class="container" id="espaçamentoinicial">
    <div class="login-erros">
    {{-- Apresentação de erros de validação --}}
             @include('inc.erros') 
                        
    

                  
  {{--====================================================================--}}
    </div>
    <div class="form_user_login">
    
            <form action="/executar_login" method="post">
                {{-- CSRF --}}
                {{csrf_field() }}
                
                <label>Email</label>
                    <input type="text" class="form-control" name="text_email" value="{{old('text_email')}}" id="text_email" placeholder="Email" >
                <label>Senha</label>
                    <input type="password" class="form-control" name="text_senha" value="{{old('text_senha')}}" id="text_senha" placeholder="Senha" >
                 
                
                <p class="botão-center">
                    <button><a href="/home">Cancelar</a></button>
                    <button type="submit" value="Criar"><i class="fa fa-sign-in"></i>Criar</button>
                </p>
            
            </form>
            
    </div>                 
</div>
    
    @include('layouts.footer')