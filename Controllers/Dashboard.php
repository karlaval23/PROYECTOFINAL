<?php 
	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			//session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDASHBOARD);
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard - Tienda Virtual";
			$data['page_title'] = "Dashboard - Tienda Virtual";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";

			$data['usuarios'] = $this->model->cantUsuarios();
			$data['clientes'] = $this->model->cantClientes();
			$data['productos'] = $this->model->cantProductos();
			$data['pedidos'] = $this->model->cantPedidos();
			$data['lastOrders'] = $this->model->lastOrders();
			$data['productosTen'] = $this->model->productosTen();
			$data['pedidosCompletos'] = $this->model->getPedidosCompletos();

			$anio = date('Y');
			$mes = date('m');
			$data['pagosMes'] = $this->model->selectPagosMes($anio,$mes);
			$data['ventasMDia'] = $this->model->selectVentasMes($anio,$mes);
			$data['ventasAnio'] = $this->model->selectVentasAnio($anio);
			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
				$this->views->getView($this,"dashboardCliente",$data);
			}else{
				$this->views->getView($this,"dashboard",$data);
			}
		}

		public function tipoPagoMes(){
			if($_POST){
				$grafica = "tipoPagoMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$pagos = $this->model->selectPagosMes($anio,$mes);
				$script = getFile("Template/Modals/graficas",$pagos);
				echo $script;
				die();
			}
		}
		public function ventasMes(){
			if($_POST){
				$grafica = "ventasMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$pagos = $this->model->selectVentasMes($anio,$mes);
				$script = getFile("Template/Modals/graficas",$pagos);
				echo $script;
				die();
			}
		}
		public function ventasAnio(){
			if($_POST){
				$grafica = "ventasAnio";
				$anio = intval($_POST['anio']);
				$pagos = $this->model->selectVentasAnio($anio);
				$script = getFile("Template/Modals/graficas",$pagos);
				echo $script;
				die();
			}
		}
		public function getPedidosPorTipoPago() {
			$data = $this->model->getPedidosPorTipoPago();
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
			die();
		}
	
		public function getPredictionData() {
			$anio = date('Y');
			$data = $this->model->getDataForPrediction($anio);
			echo json_encode($data);
		}
	
		// Nuevo método para el detalle de pedidos por día
		public function getDetallePedidoPredictionData() {
			$anio = date('Y');
			$mes = date('m') - 1; 
		
			if ($mes == 0) {
				$anio -= 1;
				$mes = 12;
			}
		
			$data = $this->model->getDetallePedidoDataForPrediction($anio, $mes);
		
			if (empty($data)) {
				error_log("No se encontraron datos para la consulta.");
			} else {
				error_log("Datos obtenidos: " . json_encode($data));
			}
		
			echo json_encode($data);
		}
		
		
		public function getDetallePedidoCurrentMonthData() {
			$anio = date('Y');
			$mes = date('m'); // Mes actual
		
			$data = $this->model->getDetallePedidoDataForCurrentMonth($anio, $mes);
		
			if (empty($data)) {
				error_log("No se encontraron datos para la consulta.");
			} else {
				error_log("Datos obtenidos: " . json_encode($data));
			}
		
			echo json_encode($data);
		}
		
		

		private function calcularCrecimiento($anterior, $actual) {
			if ($anterior == 0) {
				return $actual * 100; // Si el valor anterior es 0, cualquier aumento es un 100%
			}
			$crecimiento = (($actual - $anterior) / $anterior) * 100;
			return $crecimiento;
		}

		// predicción de productos
		

	}
 ?>