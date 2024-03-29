<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 15:28
 */

/**
 * classe TSqlSelect
 * Esta classe provê meios para manipulação de um SELECT no banco de dados
 */
final class SqlSelect extends SqlInstruction
{
    private $columns;		   // array de colunas a serem retornadas.

    /**
     * método addColumn
     * adiciona uma coluna a ser retornada pelo SELECT
     * @param $column = coluna da tabela
     */
    public function addColumn($column)
    {
        // adiciona a coluna no array
        $this->columns[] = $column;
    }

    /*
     * método getInstruction()
     * retorna a instrução de SELECT em forma de string.
     */
    public function getInstruction()
    {
        // monta a instrução de SELECT
        $this->sql = 'SELECT ';

        // monta string com os nomes de colunas
        $this->sql .= implode(',', $this->columns);

        // adiciona na cláusula FROM o nome da tabela
        $this->sql .= ' FROM ' . $this->entity;


        // faz a junção caso existe algum join para o select
        if($this->join)
        {
            $join = $this->join->dump();
            $this->sql .= $join;
        }


        // obtém a cláusula WHERE do objeto criteria.
        if ($this->criteria)
        {
            $expression = $this->criteria->dump();
            if ($expression)
            {
                $this->sql .= ' WHERE ' . $expression;
            }

            // obtém as propriedades do critério
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset= $this->criteria->getProperty('offset');

            // obtém a ordenação do SELECT
            if ($order)
            {
                $this->sql .= ' ORDER BY ' . $order;
            }
            if ($limit)
            {
                $this->sql .= ' LIMIT ' . $limit;
            }
            if ($offset)
            {
                $this->sql .= ' OFFSET ' . $offset;
            }
        }
        return $this->sql;
    }
}