<?php
class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifySesion()
    {
        $consulta = $this->db->get_where('usuarios', array(
            //el true es para que limpie este campo de inyecciones xss
            'usuario' => $this->input->post('user', true),
            'pass' => $this->input->post('pass', true),
        ));
        if ($consulta->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyUser($user)
    {
        $str = "SELECT * FROM usuarios WHERE usuario='" . $user . "'";
        $consulta = mysql_query($str);
        if (mysql_numrows($consulta) == 0) { //el usuario no existe
            return false;
        } else { //el usuario existe
            return true;
        }
    }

    public function addUser()
    {
        $this->db->insert('usuarios', array(
            //el true es para que limpie este campo de inyecciones xss
            'usuario' => $this->input->post('usuario', true),
            'contrasena' => $this->input->post('contrasena', true),
            'correo' => $this->input->post('email', true),
            'rol' => 'usuario',
        ));
    }

}
