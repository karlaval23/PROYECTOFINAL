<?php 

	class Citas extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Citas()
		{
			$data['page_id'] = 4;
			$data['page_tag'] = "Citas";
			$data['page_title'] = "Citas";
			$data['page_name'] = "Citas";
			$data['page_content'] = "Citas";
			$this->views->getView($this,"Citas",$data);
		}

	}
 ?>