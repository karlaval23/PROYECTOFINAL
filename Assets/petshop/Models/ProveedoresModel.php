<?php

class ProveedoresModel extends Mysql
{
    public $intIdProveedor;
    public $strNombre;
    public $strDescripcion;
    public $strTelefono;
    public $strEmail;
    public $strDireccion;
    public $intStatus;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectProveedores()
    {
        $sql = "SELECT * FROM proveedor";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertProveedor(string $nombre, string $descripcion, string $telefono, string $email, string $direccion, int $status)
    {
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strDireccion = $direccion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM proveedor WHERE nombre = '{$this->strNombre}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "INSERT INTO proveedor(nombre, descripcion, telefono, email, direccion, status) VALUES(?,?,?,?,?,?)";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->strTelefono, $this->strEmail, $this->strDireccion, $this->intStatus);
            $request = $this->insert($sql, $arrData);
        } else {
            $request = 0; // El proveedor ya existe
        }
        return $request;
    }

    public function selectProveedor(int $idProveedor)
    {
        $this->intIdProveedor = $idProveedor;
        $sql = "SELECT * FROM proveedor WHERE idproveedor = $this->intIdProveedor";
        $request = $this->select($sql);
        return $request;
    }

    public function updateProveedor(int $idProveedor, string $nombre, string $descripcion, string $telefono, string $email, string $direccion, int $status)
    {
        $this->intIdProveedor = $idProveedor;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strDireccion = $direccion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM proveedor WHERE nombre = '$this->strNombre' AND idproveedor != $this->intIdProveedor";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE proveedor SET nombre = ?, descripcion = ?, telefono = ?, email = ?, direccion = ?, status = ? WHERE idproveedor = $this->intIdProveedor";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->strTelefono, $this->strEmail, $this->strDireccion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist"; // El nombre del proveedor ya existe en otro proveedor
        }
        return $request;
    }

    public function deleteProveedor(int $idProveedor)
    {
        $this->intIdProveedor = $idProveedor;
        $sql = "UPDATE proveedor SET status = 0 WHERE idproveedor = ?";
        $arrData = array($this->intIdProveedor);
        $request = $this->update($sql, $arrData); // Desactivar el proveedor
        return $request ? 'ok' : 'error';
    }

}

?>
