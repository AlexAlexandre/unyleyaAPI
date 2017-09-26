<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 17:11
 */

class ColorList
{
    private $tx_nme_color;
    private $tx_hex_color;
    private $status_color_list;
    private $created_at;
    private $updated_at;

    public function __construct($tx_nme_color, $tx_hex_color, $status_color_list, $created_at = null)
    {
        $this->tx_nme_color = $tx_nme_color;
        $this->tx_hex_color = $tx_hex_color;
        $this->status_color_list = $status_color_list;
        $this->created_at = $created_at;
    }

    public function getTxNmeColor()
    {
        return $this->tx_nme_color;
    }

    public function setTxNmeColor($tx_nme_color)
    {
        $this->tx_nme_color = $tx_nme_color;
    }

    public function getTxHexColor()
    {
        return $this->tx_hex_color;
    }

    public function setTxHexColor($tx_hex_color)
    {
        $this->tx_hex_color = $tx_hex_color;
    }

    public function getStatusColorList()
    {
        return $this->status_color_list;
    }

    public function setStatusColorList($status_color_list)
    {
        $this->status_color_list = $status_color_list;
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