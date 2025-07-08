<?php 

	class Leche extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Leche()
		{
			$data['page_id'] = 5;
			$data['page_tag'] = "Leche";
			$data['page_title'] = "Leche";
			$data['page_name'] = "Leche";
			$data['page_content'] = "Leche";
			$this->views->getView($this,"Leche",$data);
		}

	}
 ?>