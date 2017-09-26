<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 17:15
 */

class Table
{
    private $cod_format;
    private $tx_nme_model;
    private $tx_measures;
    private $status_table;
    private $created_at;
    private $updated_at;


    public function __construct($cod_format, $tx_nme_model, $tx_measures, $status_table, $created_at = null)
    {
        $this->cod_format = $cod_format;
        $this->tx_nme_model = $tx_nme_model;
        $this->tx_measures = $tx_measures;
        $this->status_table = $status_table;
        $this->created_at = $created_at;
    }

    public function getCodFormat()
    {
        return $this->cod_format;
    }

    public function setCodFormat($cod_format)
    {
        $this->cod_format = $cod_format;
    }

    public function getTxNmeModel()
    {
        return $this->tx_nme_model;
    }

    public function setTxNmeModel($tx_nme_model)
    {
        $this->tx_nme_model = $tx_nme_model;
    }

    public function getTxMeasures()
    {
        return $this->tx_measures;
    }

    public function setTxMeasures($tx_measures)
    {
        $this->tx_measures = $tx_measures;
    }

    public function getStatusTable()
    {
        return $this->status_table;
    }

    public function setStatusTable($status_table)
    {
        $this->status_table = $status_table;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }


}
