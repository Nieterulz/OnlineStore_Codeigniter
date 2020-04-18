<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Login extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {

        $this->load->view('templates/header_view');
        $this->load->view('login_view');
        $this->load->view('templates/footer_view');
    }
}
