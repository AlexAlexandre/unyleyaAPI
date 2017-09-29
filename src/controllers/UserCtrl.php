<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 28/09/17
 * Time: 20:40
 */


class UserCtrl
{

    public function signIn($conn, $param)
    {
        return  UserDB::signIn($conn, $param);
    }

    public function showAll($conn)
    {
        return UserDB::showAll($conn);
    }

    public function find($conn, $id)
    {
        return UserDB::find($conn, $id);
    }

    public function create($conn, $param)
    {
        return UserDB::create($conn, $param);
    }

    public function update($conn, $param, $id)
    {
        return UserDB::update($conn, $param, $id);
    }

    public function destroy($conn, $id)
    {
        return UserDB::destroy($conn, $id);
    }
}