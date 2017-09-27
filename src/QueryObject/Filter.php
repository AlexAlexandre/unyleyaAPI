<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 11:35
 */

/**
 * Class Filter
 * Essa classe provê uma interface para definir filtros para o SQL
 */
class Filter extends Expression
{
    private $variable;
    private $operator;
    private $value;

    /**
     * Instancia um novo filtro.
     *
     * @param $variable = váriavel
     * @param $operator = ( >, <, =, IN, IS NOT NUll... )
     * @param $value    =  valor a ser comparado
     */
    public function __construct($variable, $operator, $value)
    {
        $this->variable = $variable;
        $this->operator = $operator;

        /*
         * transforma o valor de acordo com certas regras
         * antes de atribuir à propriedade $this->value
         */
        $this->value    = $this->transform($value);
    }

    public function transform($value)
    {
        // caso seja um array
        if (is_array($value))
        {
            // percorre os valores
            foreach ($value as $x)
            {
                // se for um inteiro
                if (is_integer($x))
                {
                    $foo[]= $x;
                }
                else if (is_string($x))
                {
                    // se for string, adiciona aspas
                    $foo[]= "'$x'";
                }
            }
            // converte o array em string separada por ","
            $result = '(' . implode(',', $foo) . ')';
        }
        // caso seja uma string
        else if (is_string($value))
        {
            // adiciona aspas
            $result = "'$value'";
        }
        // caso seja valor nullo
        else if (is_null($value))
        {
            // armazena NULL
            $result = 'NULL';
        }

        // caso seja booleano
        else if (is_bool($value))
        {
            // armazena TRUE ou FALSE
            $result = $value ? 'TRUE' : 'FALSE';
        }
        else
        {
            $result = $value;
        }
        // retorna o valor
        return $result;
    }

    /**
     * método dump()
     * retorna o filtro em forma de expressão
     */
    public function dump()
    {
        // concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}