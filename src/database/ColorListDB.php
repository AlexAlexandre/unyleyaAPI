<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 20:40
 */

/**
 * Class ColorListDB
 *
 * Classe responsável por fazer o tratamento de instruções do banco de dados
 * Executa um CRUD compelto da entidade Cor
 */
class ColorListDB
{

    /**
     * Classe responsável por retornar um array com todos as cores
     * cadastrados na base de dados
     *
     * @param $conn ( Conexão com o banco de dados)
     * @return array|string
     */
    public function showAll($conn)
    {

        $criteria = new Criteria();
        $criteria->add(new Filter('status_color_list', '=', 'A'));

        $sql = new SqlSelect();
        $sql->setEntity('tb_color_list');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::showAll($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por retornar um array com todos os detalhes da cor
     * especificado via ID
     *
     * @param $conn ( Conexão com o banco de dados)
     * @param $id (id_color_list)
     * @return array|string
     */
    public function find($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_color_list', '=', (int)$id));

        $sql = new SqlSelect();
        $sql->setEntity('tb_color_list');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::find($conn, $sql->getInstruction());

        return $executeSql;

    }

    /**
     * Classe responsável por criar ua cor na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_color tx_hex_color)
     * @param $id (id_color_list)
     * @return array|string
     */
    public function create($conn, $param)
    {
        $sql = new SqlInsert();
        $sql->setEntity('tb_color_list');
        $sql->setRowData('tx_nme_color', $param['tx_nme_color']);
        $sql->setRowData('tx_hex_color', $param['tx_hex_color']);
        $sql->setRowData('status_color_list', 'A');
        $sql->setRowData('created_at', date('Y-m-d H:m:s'));

        $executeSql = Crud::create($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar ua cor na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_color tx_hex_color)
     * @param $id (id_color_list)
     * @return array|string
     */
    public function update($conn, $param, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_color_list', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_color_list');
        $sql->setRowData('tx_nme_color', $param['tx_nme_color']);
        $sql->setRowData('', $param['tx_hex_color']);
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::update($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar o estado da cor para D = deletado
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param id (id_color)
     * @return array|string
     */
    public function destroy($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_color_list', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_color_list');
        $sql->setRowData('status_color_list', 'D');
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::destroy($conn, $sql->getInstruction());

        return $executeSql;
    }
}