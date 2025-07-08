<?php
class Permisos extends Controllers {
    public function __construct() {
        parent::__construct();
    }
 
    public function getPermisosRol($idrol) {
        // Conversión a entero
        $rolid = is_numeric($idrol) ? (int)$idrol : 0;
        if ($rolid > 0) {
            $arrModulos = $this->model->selectModulos();
            $arrPermisosRol = $this->model->selectPermisosRol($rolid);
            $arrRol = $this->model->getRol($rolid);
            $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
            $arrPermisoRol = array('idrol' => $rolid, 'rol' => $arrRol['nombrerol']);
 
            if (empty($arrPermisosRol)) {
                foreach ($arrModulos as &$modulo) {
                    $modulo['permisos'] = $arrPermisos;
                }
            } else {
                foreach ($arrModulos as &$modulo) {
                    $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
                    $permisosIndex = $modulo['idmodulo'] - 1; // Assuming 'idmodulo' starts from 1
                    if (isset($arrPermisosRol[$permisosIndex])) {
                        $arrPermisos = array(
                            'r' => $arrPermisosRol[$permisosIndex]['r'],
                            'w' => $arrPermisosRol[$permisosIndex]['w'],
                            'u' => $arrPermisosRol[$permisosIndex]['u'],
                            'd' => $arrPermisosRol[$permisosIndex]['d']
                        );
                    }
                    $modulo['permisos'] = $arrPermisos;
                }
            }
            $arrPermisoRol['modulos'] = $arrModulos;
            $html = getModal("modalPermisos", $arrPermisoRol);
           
            // Aquí puedes decidir cómo manejar $html, por ejemplo, enviarlo como respuesta o almacenarlo.
        }
    }
 
    public function setPermisos() {
        if ($_POST) {
            $intIdrol = isset($_POST['idrol']) ? (int)$_POST['idrol'] : 0; // Conversión a entero
            $modulos = $_POST['modulos'];
 
            $this->model->deletePermisos($intIdrol);
            foreach ($modulos as $modulo) {
                $idModulo = $modulo['idmodulo'];
                $r = empty($modulo['r']) ? 0 : 1;
                $w = empty($modulo['w']) ? 0 : 1;
                $u = empty($modulo['u']) ? 0 : 1;
                $d = empty($modulo['d']) ? 0 : 1;
                $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
            }
            $arrResponse = ($requestPermiso > 0) ?
                array('status' => true, 'msg' => 'Permisos asignados correctamente.') :
                array('status' => false, 'msg' => 'No es posible asignar los permisos.');
 
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
}
 
 ?>
