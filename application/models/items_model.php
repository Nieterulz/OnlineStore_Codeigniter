<?php
class Items_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Devuelve todos los productos de la base de datos
    public function getItems()
    {
        $str = "SELECT * FROM productos;";
        $query = $this->db->query($str);
        return $query->result();
    }

    public function getPortatiles()
    {
        $str = "SELECT * FROM productos WHERE variedad='portatil' AND stock>=1;";
        $query = $this->db->query($str);
        return $query->result();
    }

    public function getSobremesas()
    {
        $str = "SELECT * FROM productos WHERE variedad='sobremesa' AND stock>=1;";
        $query = $this->db->query($str);
        return $query->result();
    }

    public function getMoviles()
    {
        $str = "SELECT * FROM productos WHERE variedad='movil' AND stock>=1;";
        $query = $this->db->query($str);
        return $query->result();
    }

    public function getTelevisores()
    {
        $str = "SELECT * FROM productos WHERE variedad='televisor' AND stock>=1;";
        $query = $this->db->query($str);
        return $query->result();
    }

}
