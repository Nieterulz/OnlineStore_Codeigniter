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

}
