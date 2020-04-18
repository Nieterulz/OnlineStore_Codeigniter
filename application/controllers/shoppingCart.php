<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class ShoppingCart extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }

    public function index($id)
    {
        $this->load->view('templates/header_view');
        $this->load->model('shoppingCart_model');
        $items = $this->shoppingCart_model->getItems($id);
        $data = array("items" => $items);
        $this->load->view('shoppingCart_view', $data);
        $this->load->view('templates/footer_view');
    }
}
