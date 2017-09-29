<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 18:45
 */

/**
 * Class FormatDB
 *
 * Classe responsável por fazer o tratamento de instruções do banco de dados
 * Executa um CRUD compelto da entidade Formato
 *
 */
class FormatDB
{

    /**
     * Classe responsável por retornar um array com todos os formatos
     * cadastrados na base de dados
     *
     * @param $conn ( Conexão com o banco de dados)
     * @return array|string
     */
    public function showAll($conn)
    {

        $criteria = new Criteria();
        $criteria->add(new Filter('status_format', '=', 'A'));

        $sql = new SqlSelect();
        $sql->setEntity('tb_format');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::showAll($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por retornar um array com todos os detalhes da forma
     * especificado via ID
     *
     * @param $conn ( Conexão com o banco de dados)
     * @param $id (id_format)
     * @return array|string
     */
    public function find($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlSelect();
        $sql->setEntity('tb_format');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::find($conn, $sql->getInstruction());

        return $executeSql;

    }

    /**
     * Classe responsável por criar um novo formato na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_format)
     * @return array|string
     */
    public function create($conn, $param)
    {
        $sql = new SqlInsert();
        $sql->setEntity('tb_format');
        $sql->setRowData('tx_nme_format', $param['tx_nme_format']);
        $sql->setRowData('status_format', 'A');
        $sql->setRowData('created_at', date('Y-m-d H:m:s'));

        $executeSql = Crud::create($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar um formato na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_format)
     * @param $id (id_format)
     * @return array|string
     */
    public function update($conn, $param, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_format');
        $sql->setRowData('tx_nme_format', $param['tx_nme_format']);
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::update($conn, $sql->getInstruction());

        return $executeSql;
    }


    /**
     * Classe responsável por alterar o estado do formato para D = deletado
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param id (id_format)
     * @return array|string
     */
    public function destroy($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_format');
        $sql->setRowData('status_format', 'D');
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::destroy($conn, $sql->getInstruction());

        return $executeSql;
    }
}