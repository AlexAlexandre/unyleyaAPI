<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 22:55
 */

/**
 * Class TableDB
 *
 * Classe responsável por fazer o tratamento de instruções do banco de dados
 * Executa um CRUD compelto da entidade Mesa
 */
class TableDB
{

    /**
     * Classe responsável por retornar um array com todos as mesas
     * cadastrados na base de dados
     *
     * @param $conn ( Conexão com o banco de dados)
     * @return array|string
     */
    public function showAll($conn)
    {
        $join   = new Join();
        $join->add(new JoinExpression('tb_format', 'id_format', 'cod_format'));
        $join->add(new JoinExpression('tb_color_list', 'id_color_list', 'cod_color_list'));

        $criteria = new Criteria();
        $criteria->add(new Filter('status_table', '=', 'A'));

        $sql = new SqlSelect();
        $sql->setEntity('tb_table');
        $sql->addColumn('tx_nme_model');
        $sql->addColumn('tx_measures');
        $sql->addColumn('tx_nme_format');
        $sql->addColumn('tx_nme_color');
        $sql->addColumn('tx_hex_color');
        $sql->setJoin($join);
        $sql->setCriteria($criteria);

        $executeSql = Crud::showAll($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por listar todos os detalhes da mesa
     * especificado via ID
     *
     * @param $conn ( Conexão com o banco de dados)
     * @param $id (id_table)
     * @return array|string
     */
    public function find($conn, $id)
    {
        $join   = new Join();
        $join->add(new JoinExpression('tb_format', 'id_format', 'cod_format'));
        $join->add(new JoinExpression('tb_color_list', 'id_color_list', 'cod_color_list'));

        $criteria = new Criteria();
        $criteria->add(new Filter('id_table', '=', (int)$id));

        $sql = new SqlSelect();
        $sql->setEntity('tb_table');
        $sql->addColumn('tx_nme_model');
        $sql->addColumn('tx_measures');
        $sql->addColumn('tx_nme_format');
        $sql->addColumn('tx_nme_color');
        $sql->addColumn('tx_hex_color');
        $sql->setJoin($join);
        $sql->setCriteria($criteria);

        $executeSql = Crud::find($conn, $sql->getInstruction());

        return $executeSql;

    }

    /**
     * Classe responsável por criar uma nova mesa na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (cod_format, cod_color_list, tx_nme_model e tx_measures)
     * @return array|string
     */
    public function create($conn, $param)
    {
        $sql = new SqlInsert();
        $sql->setEntity('tb_table');
        $sql->setRowData('cod_format', $param['cod_format']);
        $sql->setRowData('cod_color_list', $param['cod_color_list']);
        $sql->setRowData('tx_nme_model', $param['tx_nme_model']);
        $sql->setRowData('tx_measures', $param['tx_measures']);
        $sql->setRowData('status_table', 'A');
        $sql->setRowData('created_at', date('Y-m-d H:m:s'));

        $executeSql = Crud::create($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar uma mesa na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (cod_format, cod_color_list, tx_nme_model e tx_measures)
     * @param $id (id_table)
     * @return array|string
     */
    public function update($conn, $param, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_table', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_table');
        $sql->setRowData('cod_format', $param['cod_format']);
        $sql->setRowData('cod_color_list', $param['cod_color_list']);
        $sql->setRowData('tx_nme_model', $param['tx_nme_model']);
        $sql->setRowData('tx_measures', $param['tx_measures']);
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::update($conn, $sql->getInstruction());

        return $executeSql;
    }


    /**
     * Classe responsável por alterar o estado da mesa para D = deletado
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param id (id_table)
     * @return array|string
     */
    public function destroy($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_table', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_table');
        $sql->setRowData('status_table', 'D');
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::destroy($conn, $sql->getInstruction());

        return $executeSql;
    }
}