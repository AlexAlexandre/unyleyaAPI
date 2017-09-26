<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 17:08
 */

class Format
{
    private $tx_nme_format;
    private $status_format;
    private $created_at;
    private $updated_at;


    public function __construct($tx_nme_format, $status_format, $created_at = null)
    {
        $this->tx_nme_format = $tx_nme_format;
        $this->status_format = $status_format;
        $this->created_at = $created_at;
    }

    public function getTxNmeFormat()
    {
        return $this->tx_nme_format;
    }

    public function setTxNmeFormat($tx_nme_format)
    {
        $this->tx_nme_format = $tx_nme_format;
    }

    public function getStatusFormat()
    {
        return $this->status_format;
    }

    public function setStatusFormat($status_format)
    {
        $this->status_format = $status_format;
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
