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
        $str = "SELECT * FROM productos WHERE `id`=$id AND stock>=1;";
        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function addItem($id, $cantidad)
    {
        $str = "SELECT * FROM productos WHERE `id`=$id;";
        $query = $this->db->query($str);
        $item = $query->result_array();

        $this->load->model('shoppingCart_model');
        $idCarrito = $this->shoppingCart_model->getShoppingCartId($_SESSION['id']);

        if ($this->checkItem($id, $idCarrito)) {
            $str = "UPDATE `pedidos` SET cantidad=cantidad+$cantidad WHERE id_carrito=$idCarrito AND id_producto=$id;";
            $query = $this->db->query($str);
        } else {
            $str = "INSERT INTO `pedidos` VALUES (NULL, $idCarrito, $id, $cantidad)";
            $query = $this->db->query($str);
        }

    }

    public function checkItem($id, $idCarrito)
    {
        $str = "SELECT * FROM pedidos WHERE `id_producto`=$id AND `id_carrito`=$idCarrito;";
        $query = $this->db->query($str)->result();
        return !empty($query[0]);
    }
}
