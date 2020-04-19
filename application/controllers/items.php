<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('templates/header_view');
        $this->showItems();
        $this->load->view('templates/footer_view');
    }

    public function showItems()
    {
        $this->load->model('items_model');
        $items = $this->items_model->getItems();
        $data = array("items" => $items);
        $this->load->view('items_view', $data);
    }

    public function close_sesion()
    {
        session_unset();
        $this->load->view('templates/header_view');
        $this->showItems();
        $this->load->view('templates/footer_view');
    }
}
