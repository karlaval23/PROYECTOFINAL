<?php 

	class Productos_edit extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Productos_edit()
		{
			$data['page_id'] = 6;
			$data['page_tag'] = "Productos_edit";
			$data['page_title'] = "Productos_edit";
			$data['page_name'] = "Productos_edit";
			$data['page_content'] = "Productos_edit";
			$this->views->getView($this,"Productos_edit",$data);
		}

	}
 ?>