<?php 

	class Produc extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}
       public function produc()
       {
               $data['page_id'] = 3;
               $data['page_tag'] = "Produc";
               $data['page_title'] = "Produc";
               $data['page_name'] = "produc";
               $data['page_content'] = "Produc";
               $data['productos'] = $this->model->selectProductosActive();
               $data['categorias'] = $this->model->selectCategoriasActive();
               $this->views->getView($this, "produc", $data);
       }

	}
 ?>