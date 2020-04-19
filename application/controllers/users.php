
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class Users extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {}

    public function login()
    {

        $this->load->view('templates/header_view');
        $this->load->view('login_view');
        $this->load->view('templates/footer_view');
    }

    public function register()
    {
        $this->load->view('templates/header_view');
        $this->load->view('register_view');
        $this->load->view('templates/footer_view');
    }

    public function verify_registro()
    {
        //si se envia un submit_reg por el metodo post, entonces...
        if ($this->input->post('submit_reg')) {
            //validamos usando la libreria form_validation
            //asignamos un rol (set_rules, uso(name,title,required[|...])
            //trim = limpia los espacios en blanco
            //callback_ = para llamar un método
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|callback_verifyUser');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|trim');
            $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');
            $this->form_validation->set_rules('contrasenaR', 'Repetir contraseña', 'required|trim|matches[contrasena]');
            //mensaje de error de validacion
            $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
            $this->form_validation->set_message('valid_email', 'El campo %s es inválido.');
            $this->form_validation->set_message('verifyUser', 'El %s ya existe.');
            $this->form_validation->set_message('matches', 'El campo %s no es igual que el campo %s.');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header_view');
                $this->load->view('register_view');
                $this->load->view('templates/footer_view');
            } else {
                $this->users_model->addUser();
                $datos = array('mensaje' => 'Usuario registrado correctamente.');
                $this->load->view('templates/header_view');
                $this->load->view('register_view', $datos);
                $this->load->view('templates/footer_view');
            }
        }
    }

    public function verify_sesion()
    {
        $this->load->model("users_model");
        if ($this->input->post('submit_log')) {
            //verificar
            $exists = $this->users_model->verifySesion();
            if (!$exists) {
                $datos = array('mensaje' => 'Usuario y/o Contraseña inválidos');
                $this->load->view('templates/header_view');
                $this->load->view('login_view', $datos);
                $this->load->view('templates/footer_view');
            } else {
                $userData = $this->users_model->getUser($this->input->post('usuario', true));
                $this->session->set_userdata($userData);
                $this->load->view('templates/header_view');
                $this->load->view('login_view');
                $this->load->view('templates/footer_view');
            }

        }
    }

    public function verifyUser($usuario)
    {
        $this->load->model("users_model");
        $existe = $this->users_model->verifyUser($usuario);
        return !$existe;
    }

    public function config()
    {
        $this->load->view('templates/header_view');
        $this->load->view('conf_view');
        $this->load->view('templates/footer_view');
    }

    public function changeUser()
    {
        $this->load->model("users_model");
        $existe = $this->uses_model->verifyUser($this->input->post('usuario', true));
        if (!$existe) {
            $this->users_model->changeUser($this->input->post('usuario', true));
        } else {
            $this->load->view('templates/header_view');
            $this->load->view('conf_view');
            $this->load->view('templates/footer_view');
        }
    }

}
