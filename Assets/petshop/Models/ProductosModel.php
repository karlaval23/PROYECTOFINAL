<?php

class ProductosModel extends Mysql
{
    public $intIdProducto;
    public $intIdProveedor;
    public $intIdCategoria; // Nuevo campo agregado
    public $strNombre;
    public $strDescripcion;
    public $fltPrecio;
    public $intStock;
    public $strImagen;
    public $intStatus;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectProductos()
    {
        $sql = "SELECT p.*, pr.nombre as nombre_proveedor, c.nombre as nombre_categoria FROM producto p INNER JOIN proveedor pr ON p.proveedorid = pr.idproveedor INNER JOIN categoria c ON p.categoriaid = c.idcategoria";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertProducto(int $idProveedor, int $idCategoria, string $nombre, string $descripcion, float $precio, int $stock, string $imagen, int $status)
    {
        $this->intIdProveedor = $idProveedor;
        $this->intIdCategoria = $idCategoria; // Nuevo campo agregado
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->fltPrecio = $precio;
        $this->intStock = $stock;
        $this->strImagen = $imagen;
        $this->intStatus = $status;

        $sql = "INSERT INTO producto(proveedorid, categoriaid, nombre, descripcion, precio, stock, imagen, status) VALUES(?,?,?,?,?,?,?,?)";
        $arrData = array($this->intIdProveedor, $this->intIdCategoria, $this->strNombre, $this->strDescripcion, $this->fltPrecio, $this->intStock, $this->strImagen, $this->intStatus);
        $request = $this->insert($sql, $arrData);
        return $request;
    }

    public function selectProducto(int $idProducto)
    {
        $this->intIdProducto = $idProducto;
        $sql = "SELECT p.*, pr.nombre as nombre_proveedor, c.nombre as nombre_categoria FROM producto p INNER JOIN proveedor pr ON p.proveedorid = pr.idproveedor INNER JOIN categoria c ON p.categoriaid = c.idcategoria WHERE idproducto = $this->intIdProducto";
        $request = $this->select($sql);
        return $request;
    }

    public function updateProducto(int $idProducto, int $idProveedor, int $idCategoria, string $nombre, string $descripcion, float $precio, int $stock, string $imagen, int $status)
    {
        $this->intIdProducto = $idProducto;
        $this->intIdProveedor = $idProveedor;
        $this->intIdCategoria = $idCategoria; // Nuevo campo agregado
        $this->strNombre = $nombre;
        $this->strDescripcion = $descripcion;
        $this->fltPrecio = $precio;
        $this->intStock = $stock;
        $this->strImagen = $imagen;
        $this->intStatus = $status;

        $sql = "UPDATE producto SET proveedorid = ?, categoriaid = ?, nombre = ?, descripcion = ?, precio = ?, stock = ?, imagen = ?, status = ? WHERE idproducto = $this->intIdProducto";
        $arrData = array($this->intIdProveedor, $this->intIdCategoria, $this->strNombre, $this->strDescripcion, $this->fltPrecio, $this->intStock, $this->strImagen, $this->intStatus);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function deleteProducto(int $idProducto)
    {
        $this->intIdProducto = $idProducto;
        $sql = "DELETE FROM producto WHERE idproducto = ?";
        $arrData = array($this->intIdProducto);
        $request = $this->delete($sql, $arrData);
        return $request;
    }
}

?>
