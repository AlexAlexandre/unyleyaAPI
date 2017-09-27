<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 11:31
 */

/**
 * Class Expression
 * É uma classe abstrata para gerenciar as expressões comuns do Banco de dados
 */
abstract class Expression
{
    const AND_OPERATOR = ' AND ';
    const OR_OPERATOR  = ' OR ';


    /**
     * Marca a função dump como obrigatório
     * Essa função por retornar a expressão em forma de String
     */
    abstract public function dump();
}