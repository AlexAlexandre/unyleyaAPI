<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 23:29
 */

class JoinExpression extends Expression
{
    private $tableJoin;
    private $pk;
    private $fk;

    /**
     * Instancia uma nova expressão.
     *
     * @param
     */
    public function __construct($tableJoin, $pk, $fk)
    {
        $this->tableJoin = $tableJoin;
        $this->pk = $pk;
        $this->fk = $fk;

    }


    /**
     * método dump()
     * retorna o filtro em forma de expressão
     */
    public function dump()
    {
        // concatena a expressão
        return " JOIN {$this->tableJoin} ON {$this->pk} = {$this->fk}";
    }
}