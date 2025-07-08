<?php
class ContactoModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertMessage(string $nombre,string $correo,string $telefono,string $mensaje)
    {
        $sql = "INSERT INTO contacto(nombre,correo,telefono,mensaje) VALUES(?,?,?,?)";
        $arr = array($nombre,$correo,$telefono,$mensaje);
        return $this->insert($sql,$arr);
    }
}
?>