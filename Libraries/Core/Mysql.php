<?php 
class Mysql extends Conexion
{
    private $con;
    private $strquery;
    private $arrValues = array();
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Insertar un registro
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $insert = $this->conexion->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrValues);
        if ($resInsert)
        {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert; 
    }

    // Busca un registro
    public function select(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Devuelve todos los registros
    public function select_all(string $query, array $params = [])
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        
        // Ejecutar con parámetros si se proporcionan
        if (!empty($params)) {
            $result->execute($params);
        } else {
            $result->execute();
        }
        
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Actualiza registros
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);
        return $resExecute;
    }

    // Eliminar un registros
    public function delete(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }
}
?>
