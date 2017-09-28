<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 22:55
 */

class TableCtrl
{

    public function showAll($conn)
    {
        return TableDB::showAll($conn);
    }

    public function find($conn, $id)
    {
        return TableDB::find($conn, $id);
    }

    public function create($conn, $param)
    {
        return TableDB::create($conn, $param);
    }

    public function update($conn, $param, $id)
    {
        return TableDB::update($conn, $param, $id);
    }

    public function destroy($conn, $id)
    {
        return TableDB::destroy($conn, $id);
    }
}