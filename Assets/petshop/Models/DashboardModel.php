<?php
class DashboardModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function countUsuarios()
    {
        $sql = "SELECT COUNT(*) as total FROM usuario";
        $result = $this->select($sql);
        return $result['total'];
    }

    public function countProductos()
    {
        $sql = "SELECT COUNT(*) as total FROM producto";
        $result = $this->select($sql);
        return $result['total'];
    }

    public function countProveedores()
    {
        $sql = "SELECT COUNT(*) as total FROM proveedor";
        $result = $this->select($sql);
        return $result['total'];
    }

    // Obtener los últimos mensajes de contacto para la actividad reciente
    public function getRecentContacts(int $limit = 5)
    {
        $sql = "SELECT nombre, mensaje, fecha FROM contacto ORDER BY fecha DESC LIMIT $limit";
        return $this->select_all($sql);
    }
}
?>