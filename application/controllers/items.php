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
        $items = $this->items_model->getPortatiles();
        $data = array("items" => $items);
        $this->load->view('portatiles_view', $data);
        $items = $this->items_model->getSobremesas();
        $data = array("items" => $items);
        $this->load->view('sobremesas_view', $data);
        $items = $this->items_model->getMoviles();
        $data = array("items" => $items);
        $this->load->view('moviles_view', $data);
        $items = $this->items_model->getTelevisores();
        $data = array("items" => $items);
        $this->load->view('televisores_view', $data);
    }

    public function portatiles()
    {
        $this->load->view('templates/header_view');
        $this->load->model('items_model');
        $items = $this->items_model->getPortatiles();
        $data = array("items" => $items);
        $this->load->view('portatiles_view', $data);
        $this->load->view('templates/footer_view');

    }

    public function sobremesas()
    {
        $this->load->view('templates/header_view');
        $this->load->model('items_model');
        $items = $this->items_model->getSobremesas();
        $data = array("items" => $items);
        $this->load->view('sobremesas_view', $data);
        $this->load->view('templates/footer_view');
    }

    public function moviles()
    {
        $this->load->view('templates/header_view');
        $this->load->model('items_model');
        $items = $this->items_model->getMoviles();
        $data = array("items" => $items);
        $this->load->view('moviles_view', $data);
        $this->load->view('templates/footer_view');
    }

    public function televisores()
    {
        $this->load->view('templates/header_view');
        $this->load->model('items_model');
        $items = $this->items_model->getTelevisores();
        $data = array("items" => $items);
        $this->load->view('televisores_view', $data);
        $this->load->view('templates/footer_view');
    }

    public function close_sesion()
    {
        session_unset();
        $this->index();
    }
}
