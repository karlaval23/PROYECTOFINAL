<?php 

	class Nosotros extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function nosotros()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Nosotros";
			$data['page_title'] = "Nosotros";
			$data['page_name'] = "nosotros ";
			$data['page_content'] = "Nosotros";
			$this->views->getView($this,"nosotros",$data);
		}

	}
 ?>