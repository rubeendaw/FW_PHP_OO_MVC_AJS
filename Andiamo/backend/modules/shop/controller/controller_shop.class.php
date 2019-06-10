<?php
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
}
