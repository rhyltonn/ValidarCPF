<?php

function validarCPF($cpf)
{

    $cpf = preg_replace('/[^0-9]/', '', (string) $cpf); //só coleta os números

    /*
     * PRIMEIRO VERIFICADOR
     * Estamos usando a variavel $i para separar os caracteres do CPF separadamente por isso estamos contando de 0 a 8 o que um total de 9 caracter
     * Estamos usando a variavel $v1 para fazer um decremento, ele vai contar de 10 até 2
     */
    for ($i = 0, $v1 = 10; $i <= 8, $v1 >= 2; $i++, $v1--) {

        $soma1 += $cpf[$i] * $v1;
    }
    $restoV1 = $soma1 % 11; //Resto da Divisão
    $verif1 = 11 - $restoV1; //Números de caracter subtraido por Resto


    /*
     * SEGUNDO VERIFICADOR
     * Estamos usando a variavel $i para separar os caracteres do CPF separadamente por isso
     * estamos contando de 0 a 9 o que um total de 10 caracter (SIM ESTAMOS USANDO TAMBÉM O PRIMEIRO COD. VALIDADOR DO CPF)
     * Estamos usando a variavel $v2 para fazer um decremento, ele vai contar de 11 até 2
     */
    for ($i = 0, $v2 = 11; $i <= 9, $v2 >= 2; $i++, $v2--) {

        $soma2 += $cpf[$i] * $v2;
    }
    $restoV2 = $soma2 % 11; //Resto da Divisão
    $verif2 = 11 - $restoV2; //Números de caracter subtraido por Resto


    /*
     * Esse nosso IF(SE) e muito importante veja um resumo da lógica:
     * SE[IF] (1º Verificador e igual a do CPF "3" e[AND] 2º Verificador e igual a o do CPF "4")
     */
    if ($verif1 == $cpf[9] AND $verif2 == $cpf[10]) {
        $result = "CPF Válido";
    } else {
        $result = "CPF Inválido";
    }

    return $result;
}


echo validarCPF('568.845.246-34');


?>

