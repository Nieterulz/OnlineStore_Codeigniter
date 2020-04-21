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

    public function verifyEmail($email)
    {
        $str = "SELECT * FROM usuarios WHERE correo='" . $email . "'";
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

    public function changeUser($username)
    {
        $str = "UPDATE usuarios SET `usuario`='$username' WHERE id=" . $_SESSION['id'] . ";";
        $query = $this->db->query($str);
        $_SESSION['usuario'] = $username;
    }

    public function changeEmail($email)
    {
        $str = "UPDATE usuarios SET `correo`='$email' WHERE id=" . $_SESSION['id'] . ";";
        $query = $this->db->query($str);
        $_SESSION['correo'] = $email;
    }

    public function changePasswd($passwd)
    {
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $passwd = crypt($passwd, $salt);
        $str = "UPDATE usuarios SET `contrasena`='$passwd' WHERE id=" . $_SESSION['id'] . ";";
        $query = $this->db->query($str);
        $_SESSION['contrasena'] = $passwd;
    }

    public function addItem()
    {
        $this->db->insert('productos', array(
            //el true es para que limpie este campo de inyecciones xss
            'nombre' => $this->input->post('nombre', true),
            'descripcion' => $this->input->post('descripcion', true),
            'precio' => $this->input->post('precio', true),
            'imagen' => $this->input->post('imagen', true),
            'stock' => $this->input->post('stock', true),
            'variedad' => $this->input->post('variedad', true),
        ));
    }

}
