<?php 

class ProducModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategoriasActive()
    {
        $sql = "SELECT * FROM categoria WHERE status = 1";
        return $this->select_all($sql);
    }

    public function selectProductosActive()
    {
        $sql = "SELECT * FROM producto WHERE status = 1";
        return $this->select_all($sql);
    }
}
 ?>