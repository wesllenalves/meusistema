<?php

namespace App\classes;

class geradorSenha{

public static function criarCodigo(){
    $valor = '';
    $caracteres = 'abcdefhnomputrewsy_ABCDEFHNOMPUTREWSY1234567890!?$%#';
    for($m=0; $m<10; $m++){
        $index = rand(0, strlen($caracteres));
        $valor.= substr($caracteres, $index, 1);
    }
    return $valor;
}

}
?>