<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 22:16
 */

class Join extends Expression
{
    private $expressions;



    public function __construct()
    {
        $this->expressions = array();


    }

    /**
     * método add()
     * adiciona uma expressão ao critério
     * @param $expression   = expressão (objeto Expression)
     * @param $operator     = operador lógico de comparação
     */
    public function add(Expression $expression)
    {
        // na primeira vez, não precisa de operador lógico para concatenar
        if (empty($this->expressions))
        {
            $operator = NULL;
        }

        // agrega o resultado da expressão à lista de expressões
        $this->expressions[] = $expression;

    }





    /*
     * método dump()
     * retorna o filtro em forma de expressão
     */
    public function dump()
    {
        // concatena a lista de expressões
        if (is_array($this->expressions))
        {
            if (count($this->expressions) > 0)
            {
                $result = '';
                foreach ($this->expressions as $i=> $expression)
                {
                    // concatena o operador com a respectiva expressão
                    $result .= $expression->dump() . '';

                }


                return "{$result}";
            }
        }
    }

}


// JOIN tb_nme  ON tbnme.id = cod_id;