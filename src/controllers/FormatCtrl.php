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

    private $formatDB;

    public function __construct()
    {
        $this->formatDB = new FormatDB();
    }

    public function showAll($conn)
    {

//        return $this->formatDB->showAll($conn);
    }
}