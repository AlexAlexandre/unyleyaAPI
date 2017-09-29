<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 28/09/17
 * Time: 20:45
 */

/**
 * Class UserDB
 *
 * Classe responsável por fazer o tratamento de instruções do banco de dados
 * Executa um CRUD compelto da entidade USER
 */
class UserDB
{

    /**
     * Classe responsável por verificar as credenciais do usuário,
     * Caso ele exista no banco de dados retorna true, para assim gerar um token
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_user e tx_psw_user)
     * @return array|bool
     */
    public function signIn($conn, $param)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('tx_nme_user', '=', $param['tx_nme_user']));
        $criteria->add(new Filter('tx_psw_user', '=', $param['tx_psw_user']));

        $sql = new SqlSelect();
        $sql->setEntity('tb_user');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        try{

            $select = $conn->query($sql->getInstruction());

            if($select->rowcount() > 0)
                $result = $select->fetch();
            else
                return $msg = array('code' => 204, 'message' => MessageException::msgNotFound());

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return true;
    }

    /**
     * Classe responsável por retornar um array com todos os usuários
     * cadastrados na base de dados
     *
     * @param $conn ( Conexão com o banco de dados)
     * @return array|string
     */
    public function showAll($conn)
    {

        $criteria = new Criteria();
        $criteria->add(new Filter('status_user', '=', 'A'));

        $sql = new SqlSelect();
        $sql->setEntity('tb_user');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::showAll($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por listar todos os detalhes do usuário
     * especificado via ID
     *
     * @param $conn ( Conexão com o banco de dados)
     * @param $id (id_user)
     * @return array|string
     */
    public function find($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_user', '=', (int)$id));

        $sql = new SqlSelect();
        $sql->setEntity('tb_user');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        $executeSql = Crud::find($conn, $sql->getInstruction());

        return $executeSql;

    }


    /**
     * Classe responsável por criar um novo usuário na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_user e tx_psw_user)
     * @return array|string
     */
    public function create($conn, $param)
    {
        $sql = new SqlInsert();
        $sql->setEntity('tb_user');
        $sql->setRowData('tx_nme_user', $param['tx_nme_user']);
        $sql->setRowData('tx_psw_user', $param['tx_psw_user']);
        $sql->setRowData('status_user', 'A');
        $sql->setRowData('created_at', date('Y-m-d H:m:s'));

        $executeSql = Crud::create($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar um usuário na base de dados
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param $param (tx_nme_user e tx_psw_user)
     * @param $id (id_user)
     * @return array|string
     */
    public function update($conn, $param, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_user', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_user');
        $sql->setRowData('tx_nme_user', $param['tx_nme_user']);
        $sql->setRowData('tx_psw_user', $param['tx_psw_user']);
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::update($conn, $sql->getInstruction());

        return $executeSql;
    }

    /**
     * Classe responsável por alterar o estado do usuário para D = deletado
     *
     * @param $conn  ( Conexão com o banco de dados)
     * @param id (id_user)
     * @return array|string
     */
    public function destroy($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_user', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_user');
        $sql->setRowData('status_user', 'D');
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        $executeSql = Crud::destroy($conn, $sql->getInstruction());

        return $executeSql;
    }
}