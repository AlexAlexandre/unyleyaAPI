<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 18:41
 */

//require_once ("../database/FormatDB.php");

class FormatCtrl
{

    public function showAll($conn)
    {
        return FormatDB::showAll($conn);
    }

    public function find($conn, $id)
    {
        return FormatDB::find($conn, $id);
    }

    public function create($conn, $param)
    {
        return FormatDB::create($conn, $param);
    }

    public function update($conn, $param, $id)
    {
        return FormatDB::update($conn, $param, $id);
    }

    public function destroy($conn, $id)
    {
        return FormatDB::destroy($conn, $id);
    }
}