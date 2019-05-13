<?php
class controller_home {
    function __construct() {
        $_SESSION['module'] = "home";
    }
    
    // function view_home() {
    //     require_once(VIEW_PATH_INC . "top_page.php");;
    //     require_once(VIEW_PATH_INC . "menu_no_auth.php");
    //     loadView('modules/home/view/', 'home.html');
    //     require_once(VIEW_PATH_INC . "footer.php");
    // }

    // function dropdown_types(){
    //     $json = array();
    //     $json = loadModel(MODEL_HOME, "home_model", "select_all_type");
    //     echo json_encode($json);
    // }

    // function dropdown_country(){
    //     $json = array();
    //     $json = loadModel(MODEL_HOME, "home_model", "select_all_country",$_POST['uni']);
    //     echo json_encode($json);
    // }

    function show_travels(){
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "select_all_travels");
        echo json_encode($json);
    }

    function select_search() {
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "select_search", $_GET['param']);
        echo json_encode($json);
    }
    
    function load_names(){
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "select_name");
        echo json_encode($json);
    }
    
    // function autocomplete(){
    //     $arrArgument = array(
    //         'types' => $_POST['types'],
    //         'country' => $_POST['country'],
    //         'service' => $_POST['service']
    //     );

    //     $json = array();
    //     $json = loadModel(MODEL_HOME, "home_model", "select_all_destination", $arrArgument);
    //     // echo json_encode($json);
    //     foreach ($json as $row) {
    //         echo '<div>
    //                 <a class="suggest-element" data="'.$row['destination'].'" id="service'.$row['id'].'">'.utf8_encode($row['destination']).'</a>
    //             </div>';
    //     }
    //     exit;
    // }

    // function redirect(){
    //     $arrArgument = array(
    //         'types' => $_POST['types'],
    //         'country' => $_POST['country'],
    //         'destination' => $_POST['destination']
    //     );
    //     loadModel(MODEL_HOME, "home_model", "select_filter", $arrArgument);
    //     include("module/shop/view/shop.php");
    // }

}










    // $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    // include($path . "module/home/model/DAOhome.php");
    // if (isset($_SESSION["tiempo"])) {  
	//     $_SESSION["tiempo"] = time();
    // }
    
    // switch($_GET['op']){
    //     case 'list':
    //         try{
    //             $daohome = new DAOhome();
    //         	$rdo = $daohome->select_all_travels();
    //         }catch (Exception $e){
    //             $callback = 'index.php?page=503';
	// 		    die('<script>window.location.href="'.$callback .'";</script>');
    //         }

    //         if(!$rdo){
    // 			$callback = 'index.php?page=503';
	// 		    die('<script>window.location.href="'.$callback .'";</script>');
    // 		}else{
    //             include("module/home/view/home.php");
    // 		}
    //     break;

    //     case 'dropdown_types':
    //         try{
    //             $daohome = new DAOhome();
    //             $rdo = $daohome->select_all_type();
    //         }catch (Exception $e){
    //             echo json_encode("error");
    //             exit;
    //         }
    //         if(!$rdo){
    //             echo json_encode("error");
    //             exit;
    //         }else{
    //             $types = array();
    //             foreach ($rdo as $row){
    //                 array_push($types, $row);
    //             }
    //             echo json_encode($types);
    //             exit;
    //         }
    //     break;
    
    //     case 'dropdown_country':
    //         try{
    //             $daohome = new DAOhome();
    //             $rdo = $daohome->select_all_country($_GET['uni']);
    //         }catch (Exception $e){
    //             echo json_encode("error1");
    //             exit;
    //         }
    //         if(!$rdo){
    //             echo json_encode("error");
    //             exit;
    //         }else{
    //             $countries = array();
    //             foreach ($rdo as $row){
    //                 array_push($countries, $row);
    //             }
    //             echo json_encode($countries);
    //             exit;
    //         }
    //     break;

    //     case 'autocomplete':
    //         try{
    //             $daohome = new DAOhome();
    //             $rdo = $daohome->select_all_destination($_GET['types'], $_GET['country']);
    //         }catch (Exception $e){
    //             echo json_encode("error");
    //             exit;
    //         }
    //         if(!$rdo){
    //             echo json_encode("error");
    //             exit;
    //         }else{
    //             foreach ($rdo as $row) {
    //                 echo '<div>
    //                         <a class="suggest-element" data="'.$row['destination'].'" id="service'.$row['id'].'">'.utf8_encode($row['destination']).'</a>
    //                     </div>';
    //             }
    //             exit;
    //         }
    //     break;

    //     // case 'redirect':
    //     //     try{
    //     //         $daohome = new DAOhome();
    //     //         $rdo = $daohome->select_filter($_GET['uni'],$_GET['country'],$_GET['destination']);
    //     //     }catch (Exception $e){
    //     //         $callback = 'index.php?page=503';
    //     //         die('<script>window.location.href="'.$callback .'";</script>');
    //     //     }
            
    //     //     if(!$rdo){
    //     //         $callback = 'index.php?page=503';
    //     //         die('<script>window.location.href="'.$callback .'";</script>');
    //     //     }else{
    //     //         include("module/shop/view/shop.php");
    //     //     }
    //     // break;

    //     default;
    //         include("view/inc/error404.php");
    //         break;
    // }
