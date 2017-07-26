
{{-- Apresentação dos erros de validação  --}}

@if(count($errors) != 0)
    <div class='alert alert-danger'>

        {{-- Titulo da caixa de erros  --}}
        @if (count($errors) == 1)
            <p class='titulo_erro'>Erro:</p>
        @else
            <p class='titulo_erro'>Erros:</p>
        @endif

        {{-- Apresentação dos erros  --}}
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
    </div>   
@endif

{{-- Apresentação dos erros de comunicação com o DB  --}}
@if(isset($erros_bd))
    <div class="alert alert-danger">
        @foreach ($erros_bd as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>

@endif