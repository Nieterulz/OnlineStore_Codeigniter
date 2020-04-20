<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class OneItem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {}

    public function item($id, $mensaje = array())
    {
        $this->load->view('templates/header_view');
        $this->load->model('oneItem_model');
        $item = $this->oneItem_model->getItem($id);
        $data = array('item' => $item, 'mensaje' => $mensaje);
        $this->load->view('oneItem_view', $data);
        $this->load->view('templates/footer_view');
    }

    public function addItem($id)
    {
        $this->load->model("oneItem_model");
        if ($this->input->post('submit_cart')) {
            $item = $this->oneItem_model->addItem($id, $this->input->post('quantity', true));
            $mensaje = "Añadido al carrito con éxito";
            $this->item($id, $mensaje);
        }
    }
}
