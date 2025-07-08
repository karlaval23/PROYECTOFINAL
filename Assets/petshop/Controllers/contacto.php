<?php
class Contacto extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function contacto()
    {
        $data['page_id'] = 8;
        $data['page_tag'] = "Contacto";
        $data['page_title'] = "Contacto";
        $data['page_name'] = "contacto";
        $this->views->getView($this, "contacto", $data);
    }

    public function enviar()
    {
        if($_POST){
            $nombre = $_POST['name'] ?? '';
            $correo = $_POST['email'] ?? '';
            $telefono = $_POST['phone'] ?? '';
            $mensaje = $_POST['message'] ?? '';
            $this->model->insertMessage($nombre,$correo,$telefono,$mensaje);
            echo "OK";
        }
        die();
    }
}
?>