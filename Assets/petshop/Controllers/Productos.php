<?php
class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function productos()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Productos";
        $data['page_title'] = "Productos <small> Tienda </small>";
        $data['page_name'] = "producto";
        $this->views->getView($this, "productos", $data);
    }

    public function getProductos()
    {
        $arrData = $this->model->selectProductos();
        for ($i = 0; $i < count($arrData); $i++) {

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-success">Activo</span>';
            } elseif ($arrData[$i]['status'] == 0) {
                $arrData[$i]['status'] = '<span class="me-1 badge bg-danger">Inactivo</span>';
            }
            $arrData[$i]['acciones'] = '<div class="text-center">
                <button type="button" name="btnEditProducto" class="btn btn-primary btnEditProducto" onClick="fntEditProducto(' . $arrData[$i]['idproducto'] . ')" title="Editar"><i class="bi bi-pencil"></i></button>
                <button type="button" name="btnDelProducto" class="btn btn-danger btnDelProducto" onClick="fntDelProducto(' . $arrData[$i]['idproducto'] . ')" title="Eliminar"><i class="bi bi-trash"></i></button>
                </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getProducto(int $idProducto)
    {
        $intIdProducto = intval(strClean($idProducto));
        if ($intIdProducto > 0) {
            $arrData = $this->model->selectProducto($intIdProducto);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setProducto()
    {
        $intIdProducto = intval($_POST['idProducto']);
        $intIdProveedor = intval($_POST['listProveedor']);
        $intIdCategoria = intval($_POST['listCategoria']); // Nuevo campo agregado
        $strNombre = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $fltPrecio = floatval($_POST['txtPrecio']);
        $intStock = intval($_POST['txtStock']);
        $strImagen = strClean($_POST['txtImagen']);
        $intStatus = intval($_POST['listStatus']);
        $request_producto = "";
        $option = 0; // Variable para determinar si es una creación (1) o una actualización (2)

        if ($intIdProducto == 0) {
            // Crear
            $request_producto = $this->model->insertProducto($intIdProveedor, $intIdCategoria, $strNombre, $strDescripcion, $fltPrecio, $intStock, $strImagen, $intStatus);
            $option = 1;
        } else {
            // Actualizar
            $request_producto = $this->model->updateProducto($intIdProducto, $intIdProveedor, $intIdCategoria, $strNombre, $strDescripcion, $fltPrecio, $intStock, $strImagen, $intStatus);
            $option = 2;
        }

        if ($request_producto > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
            }
        } elseif ($request_producto == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El producto ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die(); // Asegura que no se envíe ninguna salida adicional
    }

    public function delProducto()
    {
        if ($_POST) {
            $intIdProducto = intval($_POST['idproducto']);
            $requestDelete = $this->model->deleteProducto($intIdProducto);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function getSelectCategorias()
{
    $htmlOptions = "";
    $arrData = $this->model->selectCategorias();
    if (count($arrData) > 0) {
        foreach ($arrData as $categoria) {
            $htmlOptions .= '<option value="' . $categoria['idcategoria'] . '">' . $categoria['nombre'] . '</option>';
        }
    }
    echo $htmlOptions;
    die();
}
public function getSelectProveedores()
{
    $htmlOptions = "";
    $arrData = $this->model->selectProveedores();
    if (count($arrData) > 0) {
        foreach ($arrData as $proveedor) {
            $htmlOptions .= '<option value="' . $proveedor['idproveedor'] . '">' . $proveedor['nombre'] . '</option>';
        }
    }
    echo $htmlOptions;
    die();
}

}




?>
