<?php
class controller_shop {
	function __construct() {
			$_SESSION['module'] = "shop";
	}
	
	function view_shop() {
			require_once(VIEW_PATH_INC . "top_page.php");
			require_once(VIEW_PATH_INC . "menu_no_auth.php");
			loadView('modules/shop/view/', 'shop.html');
			require_once(VIEW_PATH_INC . "footer.php");
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

	function show_travels2(){
		$arrArgument = array(
			'types' => $_SESSION['uni'],
			'country' => $_SESSION['country'],
			'destination' => $_SESSION['destination']
	);
			$json = array();
			$json = loadModel(MODEL_SHOP, "shop_model", "select_filter", $arrArgument);
			echo json_encode($json);
	}

	function redirect(){
			$array  = $_GET['aux'];
			$partes = explode(",", $array);

			$_SESSION['uni']=$partes[0];
			$_SESSION['country']=$partes[1];
			$_SESSION['destination']=$partes[2];
			require_once(VIEW_PATH_INC . "top_page.php");
			require_once(VIEW_PATH_INC . "menu_no_auth.php");
			loadView('modules/shop/view/', 'shopdd.html');
			require_once(VIEW_PATH_INC . "footer.php");
	}

	function details(){
			$_SESSION['id']=$_GET['aux'];
			require_once(VIEW_PATH_INC . "top_page.php");
			require_once(VIEW_PATH_INC . "menu_no_auth.php");
			loadView('modules/shop/view/', 'shop_details.html');
			require_once(VIEW_PATH_INC . "footer.php");
	}

	function view_shop_details(){
		$arrArgument = $_SESSION['id'];
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "select_travel", $arrArgument);
		echo json_encode($json);
	}
}
