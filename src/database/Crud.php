<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 29/09/17
 * Time: 17:12
 */

/**
 * Class Crud
 *
 * Essa classe é responsável por gerenciar as operações basicas de um crud além de persistir as
 * Informações na base de dados
 */
class Crud
{


    public function showAll($conn, $sql)
    {
        try{

            $select = $conn->query($sql);

            if($select->rowCount() > 0)
            {
                while ($row =$row = $select->fetch(PDO::FETCH_ASSOC))
                {
                    $result[] = $row;
                }
            }
            else
            {
                return $msg = array('code' => 204, 'message' =>  MessageException::msgNotFound());
            }

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        $conn = null;

        return $result;
    }

    public function find($conn, $sql)
    {
        try{

            $select = $conn->query($sql);

            if($select->rowcount() > 0)
                $result = $select->fetch();
            else
                return $msg = array('code' => 204, 'message' =>  MessageException::msgNotFound());

            $conn = null;

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        $conn = null;

        return $result;
    }

    public function create($conn, $sql)
    {
        try{

            $stmt = $conn->prepare($sql);
            $stmt->execute();


        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        $conn = null;

        return $msg = array('code' => 200, 'message' => MessageException::msgCreatedSuccessful());
    }

    public function update($conn, $sql)
    {
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        $conn = null;

        return $msg = array('code' => 200, 'message' => MessageException::msgUpdatedSuccessful());
    }

    public function destroy($conn, $sql)
    {

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();

        }catch (PDOException $exception){
            //TODO: Implementar LOGS
            return $exception->getMessage();
        }

        $conn = null;

        return $msg = array('code' => 200, 'message' => MessageException::msgDeletedSuccessful());
    }

}