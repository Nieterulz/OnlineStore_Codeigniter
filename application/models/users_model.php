<?php
class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifySesion()
    {
        $usuario = $this->input->post('usuario', true);
        $query = $this->db->query("SELECT contrasena FROM usuarios WHERE usuario='$usuario' LIMIT 1");
        $row = $query->row();
        if (empty($row)) {
            return false;
        }
        $pass1 = $row->contrasena;
        $pass2 = $this->input->post('contrasena', true);
        return hash_equals($pass1, crypt($pass2, $pass1));
    }

    public function verifyUser($user)
    {
        $str = "SELECT * FROM usuarios WHERE usuario='" . $user . "'";
        $consulta = mysql_query($str);
        return !(mysql_numrows($consulta) == 0);
    }

    public function addUser()
    {
        // Encriptamos contraseña
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $contrasenaEncripted = crypt($this->input->post('contrasena', true), $salt);

        $this->db->insert('usuarios', array(
            //el true es para que limpie este campo de inyecciones xss
            'usuario' => $this->input->post('usuario', true),
            'contrasena' => $contrasenaEncripted,
            'correo' => $this->input->post('email', true),
            'rol' => 'usuario',
        ));
    }

    public function getUser($user)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE usuario='$user' LIMIT 1");
        return $query->result_array()[0];
    }

}
