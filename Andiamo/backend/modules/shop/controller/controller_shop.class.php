<?php
session_start();
class controller_shop {
	function __construct() {
			$_SESSION['module'] = "shop";
	}

	function list_search() {
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "list_search",$_GET['param']);
		echo json_encode($json);
}

	function show_travels(){
			$json = array();
			$json = loadModel(MODEL_SHOP, "shop_model", "select_all_travels");
			echo json_encode($json);
	}

	function view_shop_details(){
		$arrArgument = $_POST['id'];
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "select_travel", $arrArgument);
		echo json_encode($json);
	}

	function view_services(){
		$json = loadModel(MODEL_SHOP, "shop_model", "list_services");
		echo json_encode($json);
	}

	function view_most_like(){
		$json = loadModel(MODEL_SHOP, "shop_model", "list_most_like");
		echo json_encode($json);
	}

	function listar_servicios(){
		$arrArgument = array();

		if ($_POST['Parking'] == true){
			// array_push($arrArgument, "Parking");
			$arrArgument['Parking'] = 'Parking';
		}
		if ($_POST['Wifi'] == true){
			// array_push($arrArgument, "Wifi");
			$arrArgument['Wifi'] = 'Wifi';
		}
		if ($_POST['Piscina'] == true){
			// array_push($arrArgument, "Piscina");
			$arrArgument['Piscina'] = 'Piscina';
		}
		if ($_POST['Desayuno'] == true){
			// array_push($arrArgument, "Desayuno");
			$arrArgument['Desayuno'] = 'Desayuno';
		}

		$result = loadModel(MODEL_SHOP, "shop_model", "lista_services", $arrArgument);
		echo json_encode($result);
	}

	function slider(){
		
		// $_SESSION["minimo"] = $_POST['minimo'];
		// $_SESSION["maximo"] = $_POST['maximo'];
		
		$arrArgument = array(
			'minimo' => $_SESSION["minimo"],
			'maximo' => $_POST['maximo']
		);

		$result = loadModel(MODEL_SHOP, "shop_model", "travels_price", $arrArgument);
		echo json_encode($result);
	}
}
