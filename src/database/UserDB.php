<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 28/09/17
 * Time: 20:45
 */


class UserDB
{

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
                return $msg = array('code' => 204, 'message' => 'Resultado não encontrado');

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return true;
    }


    public function showAll($conn)
    {

        $criteria = new Criteria();
        $criteria->add(new Filter('status_format', '=', 'A'));

        $sql = new SqlSelect();
        $sql->setEntity('tb_format');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        try{

            $select = $conn->query($sql->getInstruction());

            if($select->rowCount() > 0)
            {
                while ($row =$row = $select->fetch(PDO::FETCH_ASSOC))
                {
                    $result[] = $row;
                }
            }
            else
            {
                return $msg = array('code' => 204, 'message' => 'Resultado não encontrado');
            }

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return $result;
    }

    public function find($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlSelect();
        $sql->setEntity('tb_format');
        $sql->addColumn('*');
        $sql->setCriteria($criteria);

        try{

            $select = $conn->query($sql->getInstruction());

            if($select->rowcount() > 0)
                $result = $select->fetch();
            else
                return $msg = array('code' => 204, 'message' => 'Resultado não encontrado');

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return $result;

    }

    public function create($conn, $param)
    {
        $sql = new SqlInsert();
        $sql->setEntity('tb_format');
        $sql->setRowData('tx_nme_format', $param['tx_nme_format']);
        $sql->setRowData('status_format', 'A');
        $sql->setRowData('created_at', date('Y-m-d H:m:s'));

        try{

            $stmt = $conn->prepare($sql->getInstruction());
            $stmt->execute();


        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return $msg = array('code' => 200, 'message' => 'Objeto inserido com sucesso');
    }

    public function update($conn, $param, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_format');
        $sql->setRowData('tx_nme_format', $param['tx_nme_format']);
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        try{
            $stmt = $conn->prepare($sql->getInstruction());
            $stmt->execute();

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return $msg = array('code' => 200, 'message' => 'Objeto alterado com sucesso');
    }


    public function destroy($conn, $id)
    {
        $criteria = new Criteria();
        $criteria->add(new Filter('id_format', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_format');
        $sql->setRowData('status_format', 'D');
        $sql->setRowData('updated_at', date('Y-m-d H:m:s'));
        $sql->setCriteria($criteria);

        try{
            $stmt = $conn->prepare($sql->getInstruction());
            $stmt->execute();

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        return $msg = array('code' => 200, 'message' => 'Objeto Apagado com sucesso');
    }
}