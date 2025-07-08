<?php
class Categorias extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categorias()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Categorías";
        $data['page_title'] = "Categorías <small> Tienda </small>";
        $data['page_name'] = "categoria";
        $this->views->getView($this, "categorias", $data);
    }

    public function getCategorias()
    {
        $arrData = $this->model->selectCategorias();
        for ($i = 0; $i < count($arrData); $i++) {

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-success">Activo</span>';
            } elseif ($arrData[$i]['status'] == 0) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-danger">Inactivo</span>';
            }
            $arrData[$i]['acciones'] = '<div class="text-center">
                <button type="button" name="btnEditCategoria" class="btn btn-primary btnEditCategoria" onClick="fntEditCategoria(' . $arrData[$i]['idcategoria'] . ')" title="Editar"><i class="bi bi-pencil"></i></button>
                <button type="button" name="btnDelCategoria" class="btn btn-danger btnDelCategoria" onClick="fntDelCategoria(' . $arrData[$i]['idcategoria'] . ')" title="Eliminar"><i class="bi bi-trash"></i></button>
                </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getCategoria(int $idCategoria)
    {
        $intIdCategoria = intval(strClean($idCategoria));
        if ($intIdCategoria > 0) {
            $arrData = $this->model->selectCategoria($intIdCategoria);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setCategoria()
    {
        $intIdCategoria = intval($_POST['idCategoria']);
        $strNombre = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intval($_POST['listStatus']);
        $request_categoria = "";
        $option = 0; // Variable para determinar si es una creación (1) o una actualización (2)

        if ($intIdCategoria == 0) {
            // Crear
            $request_categoria = $this->model->insertCategoria($strNombre, $strDescripcion, $intStatus);
            $option = 1;
        } else {
            // Actualizar
            $request_categoria = $this->model->updateCategoria($intIdCategoria, $strNombre, $strDescripcion, $intStatus);
            $option = 2;
        }

        if ($request_categoria > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
            }
        } elseif ($request_categoria == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! La categoría ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die(); // Asegura que no se envíe ninguna salida adicional
    }

    public function delCategoria()
    {
        if ($_POST) {
            $intIdCategoria = intval($_POST['idcategoria']);
            $requestDelete = $this->model->deleteCategoria($intIdCategoria);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la categoría');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la categoría.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getSelectCategorias()
    {
        $result = $this->model->selectCategorias(); // Llama al modelo que trae los datos
        $categorias = [];
        if ($result) {
            foreach ($result as $categoria) {
                $categorias[] = [
                    'idcategoria' => $categoria['idcategoria'],
                    'nombre' => $categoria['nombre']
                ];
            }
        }
        echo json_encode($categorias); // Devuelve el resultado en formato JSON
        die();
    }



}
?>
