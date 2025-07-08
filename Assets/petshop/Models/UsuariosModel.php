<?php
class UsuariosModel extends Mysql
{
    public $intIdUsuario;
    public $strNombre;
    public $strEmail;
    public $strPassword;
    public $strTelefono;
    public $intRolId;
    public $intStatus;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectUsuarios()
    {
        // Extract all active users
        $sql = "SELECT u.*, r.nombrerol AS rol FROM usuario u
        INNER JOIN rol r ON u.rolid = r.idrol";
        // $sql = "SELECT * FROM usuario WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertUsuario(string $nombre, string $email, string $telefono, string $password, int $rolId)
    {
        $this->strNombre = $nombre;
        $this->strEmail = $email;
        $this->strTelefono = $telefono;
        $this->strPassword = password_hash($password, PASSWORD_DEFAULT); // Asegurarse de que la contraseña está hasheada
        $this->intRolId = $rolId;

        // Primero, verifiquemos si el rol existe
        $sqlCheckRol = "SELECT idrol FROM rol WHERE idrol = $this->intRolId";
        $existRol = $this->select($sqlCheckRol);

        if (empty($existRol)) {
            return 'Rol no existe'; // Rol no existe, retornamos un mensaje o código de error
        }

        // Verificar si el email ya existe
        $sql = "SELECT * FROM usuario WHERE email = '{$this->strEmail}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "INSERT INTO usuario(nombre, email, telefono, password, rolid) VALUES(?,?,?,?,?)";
            $arrData = array($this->strNombre, $this->strEmail, $this->strTelefono, $this->strPassword, $this->intRolId);
            $request = $this->insert($sql, $arrData);
            return $request;
        } else {
            return 0; // Email ya existe
        }
    }

    public function selectUsuario(int $idUsuario)
    {
        // Search for user by ID
        $this->intIdUsuario = $idUsuario;
        $sql = "SELECT * FROM usuario WHERE idusuario = $this->intIdUsuario";
        $request = $this->select($sql);
        return $request;
    }

    public function updateUsuario(int $idUsuario, string $nombre, string $email, string $telefono, $password, int $rolId, int $status)
{
    $updateSQL = "UPDATE usuario SET nombre = ?, email = ?, telefono = ?, rolid = ?, status = ?";
    $arrData = [$nombre, $email, $telefono, $rolId, $status];

    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $updateSQL .= ", password = ?";
        $arrData[] = $password;
    }

    $updateSQL .= " WHERE idusuario = ?";
    $arrData[] = $idUsuario;

    $request = $this->update($updateSQL, $arrData);
    return $request ? "success" : "error";
}

    public function deleteUsuario(int $idUsuario)
    {
        $this->intIdUsuario = $idUsuario;
        $sql = "UPDATE usuario SET status = ? WHERE idusuario = $this->intIdUsuario";
        $arrData = array(0);  // Set status to 0, effectively disabling the user
        $request = $this->update($sql, $arrData);
        return $request ? 'ok' : 'error';
    }
}

?>