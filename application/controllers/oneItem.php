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

    public function item($id)
    {
        $this->load->view('templates/header_view');
        $this->load->model('oneItem_model');
        $item = $this->oneItem_model->getItem($id);
        $data = array('item' => $item);
        $this->load->view('oneItem_view', $data);
        $this->load->view('templates/footer_view');
    }
}
