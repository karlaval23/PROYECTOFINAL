<?php
class Carrito extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function carrito()
    {
        $data['page_id'] = 7;
        $data['page_tag'] = "Carrito";
        $data['page_title'] = "Carrito de compras";
        $data['page_name'] = "carrito";
        $this->views->getView($this, "carrito", $data);
    }

    public function addItem()
    {
        if($_POST){
            session_start();
            $id = intval($_POST['id']);
            $this->model->addItem(session_id(), $id, 1);
            $items = $this->model->getItems(session_id());
            foreach($items as &$it){
                $it['imagen'] = BASE_URL."Assets/imgCliente/img_petshop/".$it['imagen'];
                $it['precio'] = number_format($it['precio'],2);
            }
            echo json_encode($items, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

public function getItems()
    {
        session_start();
        $items = $this->model->getItems(session_id());
        foreach($items as &$it){
            $it['imagen'] = BASE_URL."Assets/imgCliente/img_petshop/".$it['imagen'];
            $it['precio'] = number_format($it['precio'],2);
        }
        echo json_encode($items, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function removeItem()
    {
        if($_POST){
            session_start();
            $id = intval($_POST['id']);
            $this->model->removeItem(session_id(), $id);
            $items = $this->model->getItems(session_id());
            foreach($items as &$it){
                $it['imagen'] = BASE_URL."Assets/imgCliente/img_petshop/".$it['imagen'];
                $it['precio'] = number_format($it['precio'],2);
            }
            echo json_encode($items, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>