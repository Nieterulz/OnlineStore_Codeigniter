<?php
class ShoppingCart_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {
        $str = "SELECT id FROM carritos WHERE `id_usuario`= " . $_SESSION['id'] . "  AND vendido IS FALSE;";
        $query = $this->db->query($str);
        if (!empty($query->result()[0])) {
            $idCarrito = $query->row()->id;

            $str = "SELECT `id_producto`, `nombre`, `imagen`, `precio`, `cantidad`, `variedad`
                FROM `pedidos`
                INNER JOIN `productos`
                ON (`pedidos`.id_producto = `productos`.id AND `id_carrito`=$idCarrito);";
            $query = $this->db->query($str);
            $data = $query->result();
        } else {
            $data = "";
        }
        return $data;
    }

    public function getShoppingCartId($id)
    {
        $str = "SELECT `id` FROM carritos WHERE id_usuario='" . $id . "' AND vendido IS FALSE";
        $query = $this->db->query($str)->result();
        if (!empty($query[0])) {
            return $query[0]->id;
        } else {
            $this->createShoppingCart($id);
            $str = "SELECT `id` FROM carritos WHERE id_usuario='" . $id . "' AND vendido IS FALSE";
            $query = $this->db->query($str)->result();
            return $query[0]->id;
        }
    }

    public function getId($id)
    {
        $str = "SELECT `id` FROM carritos WHERE id_usuario='" . $id . "' AND vendido IS FALSE";
        $query = $this->db->query($str)->result();
        if (!empty($query)) {
            return $query[0]->id;
        }
    }

    public function createShoppingCart($id)
    {
        $str = "INSERT INTO `carritos` VALUES (NUll, $id, FALSE)";
        $query = $this->db->query($str);
    }

    public function buy($idCarrito)
    {
        $str = "UPDATE carritos SET `vendido`=TRUE WHERE id=$idCarrito;";
        $query = $this->db->query($str);
    }
}
