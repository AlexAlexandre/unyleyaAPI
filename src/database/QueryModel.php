<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 20:05
 */

class QueryModel
{


    public function showAll($conn, $model)
    {
        $query = "SELECT * FROM $model->table";
        $result = $conn->query($query);

        if($result->rowCount() > 0)
            $row = $result->fetchAll();


        return $row;
    }

    public function find($conn, $model, $id)
    {
        $query = "SELECT * FROM $model->table WHERE $model->pk = $id";

        $result = $conn->query($query);

        if($result->rowCount() > 0)
            $row = $result->fetchAll();


        return $row;
    }

    public function create($conn, $model, $param)
    {
        $fields = "";
        $values = "";


        foreach ($param as $key => $value):
            $fields     .= $key . ', ';
            $values     .= "'" . $value. '\', ';
        endforeach;

        $fields = substr($fields, 0, -2);
        $fields = substr_replace($fields, ' ', strlen($fields), -1);


        $values = substr($values, 0, -2);
        $values = substr_replace($values, ' ', strlen($values), -1);

        $sql = "INSERT INTO $model->table (" . $fields . ") VALUES (" . $values . ");";

//        die(var_dump($sql));

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        die(var_dump($stmt));
        return $stmt;
    }

    public function update($conn, $model, $id)
    {

    }
    public function destroy($conn, $model, $id)
    {
        $stmt = $conn->prepare("UPDATE $model->table SET $model->status = 'D' WHERE $model->pk = $id;");
        $stmt->execute();

        return $stmt;
    }

}