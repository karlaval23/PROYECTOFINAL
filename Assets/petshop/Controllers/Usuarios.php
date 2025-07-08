<?php
class Usuarios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function usuarios()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Usuarios";
        $data['page_title'] = "Usuarios <small> Tienda </small>";
        $data['page_name'] = "usuarios";
        $this->views->getView($this, "usuarios", $data);
    }

    public function getUsuarios()
    {
        $arrData = $this->model->selectUsuarios();
        if (!$arrData) {
            echo json_encode(['status' => false, 'msg' => 'Error al cargar los datos']);
            die();
        }

        for ($i = 0; $i < count($arrData); $i++) {
            $arrData[$i]['status'] = $arrData[$i]['status'] == 1
                ? '<span class="badge bg-success">Activo</span>'
                : '<span class="badge bg-danger">Inactivo</span>';

            $arrData[$i]['acciones'] = '<div class="text-center">
            <button class="btn btn-primary btnEditUsuario" onClick="fntEditUsuario(' . $arrData[$i]['idusuario'] . ')" title="Editar"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-danger btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['idusuario'] . ')" title="Eliminar"><i class="bi bi-trash"></i></button>
        </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function getUsuario(int $idusuario)
    {
        $intIdUsuario = intval(strClean($idusuario));
        if ($intIdUsuario > 0) {
            $arrData = $this->model->selectUsuario($intIdUsuario);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setUsuario() {
        $intIdUsuario = intval($_POST['idUsuario']);
        $strNombre = strClean($_POST['txtNombre']);
        $strEmail = strClean($_POST['txtEmail']);
        $strTelefono = strClean($_POST['txtTelefono']);
        $strPassword = isset($_POST['txtPassword']) ? strClean($_POST['txtPassword']) : null; // Asegurarse de verificar si existe antes de usarla
        $intRolId = intval($_POST['listRol']);
        $intStatus = intval($_POST['listStatus']);
    
        if ($strNombre == '' || $strEmail == '' || $strTelefono == '' || $intRolId == '' || $intStatus == '') {
            $arrResponse = array('status' => false, 'msg' => 'Todos los campos son obligatorios excepto la contraseña.');
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    
        if ($intIdUsuario == 0) {
            // Crear un nuevo usuario
            $request_usuario = $this->model->insertUsuario($strNombre, $strEmail, $strTelefono, $strPassword, $intRolId, $intStatus);
        } else {
            // Actualizar un usuario existente
            $request_usuario = $this->model->updateUsuario($intIdUsuario, $strNombre, $strEmail, $strTelefono, $strPassword, $intRolId, $intStatus);
        }
    
        if ($request_usuario > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else if ($request_usuario == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El usuario ya existe.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
        }
    
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    

    public function delUsuario()
    {
        if ($_POST) {
            $intIdUsuario = intval($_POST['idUsuario']);
            $requestDelete = $this->model->deleteUsuario($intIdUsuario);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Usuario');
            } else if ($requestDelete == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Usuario asociado a pedidos activos.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Usuario.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>