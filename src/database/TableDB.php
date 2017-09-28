<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 22:55
 */


class TableDB
{

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

        try{

            $select = $conn->query($sql->getInstruction());

            if($select->rowcount() > 0)
                $result = $select->fetch();
            else
                return $msg = array('code' => 204, 'message' => 'Not found');

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
        $sql->setEntity('tb_table');
        $sql->setRowData('cod_format', $param['cod_format']);
        $sql->setRowData('cod_color_list', $param['cod_color_list']);
        $sql->setRowData('tx_nme_model', $param['tx_nme_model']);
        $sql->setRowData('tx_measures', $param['tx_measures']);
        $sql->setRowData('status_table', 'A');
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
        $criteria->add(new Filter('id_table', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_table');
        $sql->setRowData('cod_format', $param['cod_format']);
        $sql->setRowData('cod_color_list', $param['cod_color_list']);
        $sql->setRowData('tx_nme_model', $param['tx_nme_model']);
        $sql->setRowData('tx_measures', $param['tx_measures']);
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
        $criteria->add(new Filter('id_table', '=', (int)$id));

        $sql = new SqlUpdate();
        $sql->setEntity('tb_table');
        $sql->setRowData('status_table', 'D');
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