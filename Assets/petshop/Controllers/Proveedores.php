<?php

class Proveedores extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function proveedores()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Proveedores";
        $data['page_title'] = "Proveedores <small> Tienda </small>";
        $data['page_name'] = "proveedor";
        $this->views->getView($this, "proveedores", $data);
    }

    public function getProveedores()
    {
        $arrData = $this->model->selectProveedores();
        for ($i = 0; $i < count($arrData); $i++) {

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-success">Activo</span>';
            } elseif ($arrData[$i]['status'] == 0) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-danger">Inactivo</span>';
            }
            $arrData[$i]['acciones'] = '<div class="text-center">
                <button type="button" name="btnEditProveedor" class="btn btn-primary btnEditProveedor" onClick="fntEditProveedor(' . $arrData[$i]['idproveedor'] . ')" title="Editar"><i class="bi bi-pencil"></i></button>
                <button type="button" name="btnDelProveedor" class="btn btn-danger btnDelProveedor" onClick="fntDelProveedor(' . $arrData[$i]['idproveedor'] . ')" title="Eliminar"><i class="bi bi-trash"></i></button>
                </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getProveedor(int $idProveedor)
    {
        $intIdProveedor = intval(strClean($idProveedor));
        if ($intIdProveedor > 0) {
            $arrData = $this->model->selectProveedor($intIdProveedor);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setProveedor()
    {
        $intIdProveedor = intval($_POST['idProveedor']);
        $strNombre = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strTelefono = strClean($_POST['txtTelefono']);
        $strEmail = strClean($_POST['txtEmail']);
        $strDireccion = strClean($_POST['txtDireccion']);
        $intStatus = intval($_POST['listStatus']);
        $request_proveedor = "";
        $option = 0; // Variable para determinar si es una creación (1) o una actualización (2)

        if ($intIdProveedor == 0) {
            // Crear
            $request_proveedor = $this->model->insertProveedor($strNombre, $strDescripcion, $strTelefono, $strEmail, $strDireccion, $intStatus);
            $option = 1;
        } else {
            // Actualizar
            $request_proveedor = $this->model->updateProveedor($intIdProveedor, $strNombre, $strDescripcion, $strTelefono, $strEmail, $strDireccion, $intStatus);
            $option = 2;
        }

        if ($request_proveedor > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
            }
        } elseif ($request_proveedor == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El proveedor ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die(); // Asegura que no se envíe ninguna salida adicional
    }

    public function delProveedor()
    {
        if ($_POST) {
            $intIdProveedor = intval($_POST['idproveedor']);
            $requestDelete = $this->model->deleteProveedor($intIdProveedor);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el proveedor');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el proveedor.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getSelectProveedores()
    {
        $result = $this->model->selectProveedores(); // Llama al modelo que trae los datos
        $proveedores = [];
        if ($result) {
            foreach ($result as $proveedor) {
                $proveedores[] = [
                    'idproveedor' => $proveedor['idproveedor'],
                    'nombre' => $proveedor['nombre']
                ];
            }
        }
        echo json_encode($proveedores); // Devuelve el resultado en formato JSON
        die();
    }
}
?>
