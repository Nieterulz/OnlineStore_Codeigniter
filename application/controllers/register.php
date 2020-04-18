<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Register extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->view('templates/header_view');
        $this->load->view('register_view');
        $this->load->view('templates/footer_view');
    }

    public function validar()
    {
        //reglas de validacion

        $this->form_validation->set_rules('usuario', 'Usuario', 'required|max_length[100]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|max_length[200]');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|min_lenght[8]');
        $this->form_validation->set_rules('contrasenaR', 'Repetir Contraseña', 'required|min_lenght[8]');
        //mensaje de error de validacion
        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('max_length', 'El campo %s tiene como máximo %s caracteres.');
        $this->form_validation->set_message('min_lenght', 'El campo %s tiene como mínimo %s caracteres.');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array('titulo' => 'Articulo',
                'titulo_articulo' => $this->input->post('titulo'),
                'descripcion' => $this->input->post('descripcion'),
                'cuerpo' => $this->input->post('cuerpo'),
            );
            $this->load->view('un_articulo_view', $data);
        }
    }
}
