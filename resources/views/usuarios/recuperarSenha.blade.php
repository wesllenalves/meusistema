@include('layouts.head')
<div class="container" id="espaçamentoinicial">
               
                    
                    <h4 class="text-center" id="Login">Recuperar Login</h4>
        {{-- Apresentação de erros de validação --}}
             @include('inc.erros')   
        {{--====================================================================--}}
                <div class="form_user_new">
                    <form action="/executa_recuperar" method="post">
                        {{-- CSRF --}}
                        {{csrf_field() }}
                        
                            <input type="text" class="form-control" name="text_email" id="text_email" placeholder="Email" >
                        
                            

                        <p class="text-center">
                            <button type="submit" class="btn btn-template-main" value="Cancelar"><i class="fa fa-sign-in"></i>Cancelar</button>
                            <button type="submit" class="btn btn-template-main" value="Recuperar"><i class="fa fa-sign-in"></i>Recuperar</button>
                        </p>

                    </form>
    </div>
</div>

@include('layouts.footer')