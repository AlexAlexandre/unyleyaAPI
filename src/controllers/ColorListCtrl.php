<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 27/09/17
 * Time: 20:33
 */


class ColorListCtrl
{

    public function showAll($conn)
    {
        return ColorListDB::showAll($conn);
    }

    public function find($conn, $id)
    {
        return ColorListDB::find($conn, $id);
    }

    public function create($conn, $param)
    {
        return ColorListDB::create($conn, $param);
    }

    public function update($conn, $param, $id)
    {
        return ColorListDB::update($conn, $param, $id);
    }

    public function destroy($conn, $id)
    {
        return ColorListDB::destroy($conn, $id);
    }
}