<?php
/**
 * User: Alex Alexandre
 * E-mail: alexalexandrejr@gmail.com
 * Date: 26/09/17
 * Time: 17:18
 */

class AvailableColors
{
    private $cod_color;
    private $cod_table;
    private $status_available_colors;
    private $created_at;
    private $updated_at;


    public function __construct($cod_color, $cod_table, $status_available_colors, $created_at = null)
    {
        $this->cod_color = $cod_color;
        $this->cod_table = $cod_table;
        $this->status_available_colors = $status_available_colors;
        $this->created_at = $created_at;
    }

    public function getCodColor()
    {
        return $this->cod_color;
    }

    public function setCodColor($cod_color)
    {
        $this->cod_color = $cod_color;
    }

    public function getCodTable()
    {
        return $this->cod_table;
    }

    public function setCodTable($cod_table)
    {
        $this->cod_table = $cod_table;
    }

    public function getStatusAvailableColors()
    {
        return $this->status_available_colors;
    }

    public function setStatusAvailableColors($status_available_colors)
    {
        $this->status_available_colors = $status_available_colors;
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