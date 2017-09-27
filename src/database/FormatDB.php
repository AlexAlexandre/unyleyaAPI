<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 18:45
 */

require_once ('QueryModel.php');

class FormatDB
{

    public function showAll($conn)
    {
        $format = new Format();

//        $result = QueryModel::showAll($conn, $format);
        $param = array('tx_nme_format' => 'TESTE', 'status_format' => 'A');

        $result = QueryModel::create($conn, $format, $param);
        return $result;
    }
}