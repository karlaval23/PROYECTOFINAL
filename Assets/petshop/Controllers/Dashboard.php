<?php
class Dashboard extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = 'Dashboard';
        $data['page_title'] = 'Página de Dashboard';
        $data['page_name'] = 'Dashboard';

        // Load statistics
        $data['totalUsuarios'] = $this->model->countUsuarios();
        $data['totalProductos'] = $this->model->countProductos();
        $data['totalProveedores'] = $this->model->countProveedores();

        // Obtener actividad reciente de mensajes de contacto
        $data['recentContacts'] = $this->model->getRecentContacts();

        $this->views->getView($this, 'dashboard', $data);
    }
}
?>