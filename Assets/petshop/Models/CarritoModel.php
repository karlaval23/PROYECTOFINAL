<?php
class CarritoModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    private function getCartId(string $sessionId)
    {
        $sql = "SELECT idcarrito FROM carrito WHERE sessionid = '$sessionId'";
        $request = $this->select($sql);
        if(empty($request)){
            $sql = "INSERT INTO carrito(sessionid) VALUES(?)";
            $arr = array($sessionId);
            return $this->insert($sql, $arr);
        }
        return $request['idcarrito'];
    }

    public function addItem(string $sessionId, int $productId, int $cantidad=1)
    {
        $cartId = $this->getCartId($sessionId);
        $sql = "SELECT id,cantidad FROM carrito_detalle WHERE idcarrito = $cartId AND productoId = $productId";
        $exist = $this->select($sql);
        if(empty($exist)){
            $prod = $this->select("SELECT precio FROM producto WHERE idproducto = $productId");
            $price = $prod ? floatval($prod['precio']) : 0;
            $sql = "INSERT INTO carrito_detalle(idcarrito,productoId,cantidad,precio) VALUES(?,?,?,?)";
            $arr = array($cartId,$productId,$cantidad,$price);
            $this->insert($sql,$arr);
        }else{
            $cantidad += intval($exist['cantidad']);
            $sql = "UPDATE carrito_detalle SET cantidad=? WHERE id=?";
            $arr = array($cantidad,$exist['id']);
            $this->update($sql,$arr);
        }
        return true;
    }

public function getItems(string $sessionId)
    {
        $cartId = $this->getCartId($sessionId);
        $sql = "SELECT cd.productoId as id, cd.cantidad, p.nombre, p.precio, p.imagen FROM carrito_detalle cd JOIN producto p ON cd.productoId = p.idproducto WHERE cd.idcarrito = $cartId";
        return $this->select_all($sql);
    }

    public function removeItem(string $sessionId, int $productId)
    {
        $cartId = $this->getCartId($sessionId);
        $sql = "DELETE FROM carrito_detalle WHERE idcarrito = $cartId AND productoId = $productId";
        return $this->delete($sql);
    }
}
?>