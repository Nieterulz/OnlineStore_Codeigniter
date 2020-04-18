<?php
class OneItem_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Devuelve todos los productos de la base de datos
    public function getItem($id)
    {
        $str = "SELECT * FROM productos WHERE `id`=$id;";
        $query = $this->db->query($str);
        return $query->result_array();
    }

}
