<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class ShoppingCart extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index()
    {
        $this->load->view('templates/header_view');
        $this->load->model('shoppingCart_model');
        $items = $this->shoppingCart_model->getItems();
        $data = array("items" => $items);
        $this->load->view('shoppingCart_view', $data);
        $this->load->view('templates/footer_view');
    }

    public function deleteItem($idItem)
    {
        $this->load->model('shoppingCart_model');
        $idCarrito = $this->shoppingCart_model->deleteItem($idItem);
        $this->index(); 
    }

    public function realizarPedido()
    {
        $this->load->model('shoppingCart_model');
        $idCarrito = $this->shoppingCart_model->getId($_SESSION['id']);
        if (isset($idCarrito)) {
            $this->shoppingCart_model->buy($idCarrito);
        }
        $this->index();
    }
}
