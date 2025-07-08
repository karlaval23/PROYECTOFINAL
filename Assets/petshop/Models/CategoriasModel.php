<?php

class CategoriasModel extends Mysql
{
    public $intIdCategoria;
    public $strNombre;
    public $strDescripcion;
    public $intStatus;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategorias()
    {
        $sql = "SELECT * FROM categoria";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertCategoria(string $nombre, string $descripcion, int $status)
    {
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM categoria WHERE nombre = '{$this->strNombre}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "INSERT INTO categoria(nombre, descripcion, status) VALUES(?,?,?)";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->intStatus);
            $request = $this->insert($sql, $arrData);
        } else {
            $request = 0; // La categoría ya existe
        }
        return $request;
    }

    public function selectCategoria(int $idCategoria)
    {
        $this->intIdCategoria = $idCategoria;
        $sql = "SELECT * FROM categoria WHERE idcategoria = $this->intIdCategoria";
        $request = $this->select($sql);
        return $request;
    }

    public function updateCategoria(int $idCategoria, string $nombre, string $descripcion, int $status)
    {
        $this->intIdCategoria = $idCategoria;
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM categoria WHERE nombre = '$this->strNombre' AND idcategoria != $this->intIdCategoria";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE categoria SET nombre = ?, descripcion = ?, status = ? WHERE idcategoria = $this->intIdCategoria";
            $arrData = array($this->strNombre, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist"; // El nombre de la categoría ya existe en otra categoría
        }
        return $request;
    }

    public function deleteCategoria(int $idCategoria)
    {
        $this->intIdCategoria = $idCategoria;
        $sql = "UPDATE categoria SET status = 0 WHERE idcategoria = ?";
        $arrData = array($this->intIdCategoria);
        $request = $this->update($sql, $arrData); // Desactivar la categoría
        return $request ? 'ok' : 'error';
    }

}

?>