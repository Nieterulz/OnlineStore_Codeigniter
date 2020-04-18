<?php
class ShoppingCart_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Devuelve todos los productos de la base de datos
    public function getItems($id)
    {
        $str = "SELECT id FROM carritos WHERE `id_usuario`=$id;";
        $query = $this->db->query($str);
        $idCarrito = $query->result()->id;

        $str = "SELECT id_producto, nombre, imagen, precio, cantidad
			FROM pedidos
			INNER JOIN productos
			ON (pedidos.id_producto = productos.id AND id_carrito=$idCarrito;";
        $query = $this->db->query($str);
        $data = $query->result();

        print_r($data);
        // return $query->result_array();
    }

}
