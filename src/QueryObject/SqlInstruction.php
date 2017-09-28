<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 12:15
 */

abstract class SqlInstruction
{
    protected $sql;		     // armazena a instrução SQL
    protected $criteria;	 // armazena o objeto critério
    protected $entity;
    protected $join;

    /**
     * método setEntity()
     * Define o nome da entidade (tabela) manipulada pela instrução SQL
     * @param $entity = tabela
     */
    final public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * método getEntity()
     * Retorna o nome da entidade (tabela)
     */
    final public function getEntity()
    {
        return $this->entity;
    }

    /**
     * método setCriteria()
     * Define um critério de seleção dos dados através da composição de um objeto
     * do tipo Criteria, que oferece uma interface para definição de critérios
     * @param $criteria = objeto do tipo Criteria
     */
    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * método setJoin()
     * Define um join de seleção dos dados através da composição de um objeto
     * do tipo Join, que oferece uma interface para definição de junções
     * @param $criteria = objeto do tipo Criteria
     */
    public function setJoin(Join $join)
    {
        $this->join = $join;
    }

    /**
     * método getInstruction()
     * Declarando-o como <abstract> obrigamos sua declaração nas classes filhas,
     * uma vez que seu comportamento será distinto em cada uma delas, configurando polimorfismo.
     */
    abstract function getInstruction();
}