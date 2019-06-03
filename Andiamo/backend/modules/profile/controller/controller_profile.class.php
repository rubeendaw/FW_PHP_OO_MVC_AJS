<?php
class controller_profile {
    public function __construct() {
        include(FUNCTIONS_PROFILE . "functions_profile.inc.php");
        $_SESSION['module'] = "profile";
    }

    function print_user(){
        $result = loadModel(MODEL_PROFILE,'profile_model','print_user',$_GET['param']);
        echo json_encode($result[0]);
    }

    public function view_profile() {
            // require_once(VIEW_PATH_INC . "header.php")
            require_once(VIEW_PATH_INC . "top_page.php");;
            require_once(VIEW_PATH_INC . "menu_no_auth.php");
            loadView('modules/profile/view/', 'profile.html');
            require_once(VIEW_PATH_INC . "footer.php");
      
      
            // require_once(VIEW_PATH_INC . "footer.html");
        }

        public function upload_avatar() {
            // if ((isset($_POST["upload"])) && ($_POST["upload"] == true)) {
                $result_prodpic = upload_files();
                // $rest = substr(json_encode($result_prodpic),13);
                $_SESSION['result_prodpic'] = $result_prodpic;
                echo json_encode($result_prodpic);
            // }
        }


        public function alta_profile(){
            $jsondata = array();
            $profileJSON = json_decode($_POST['prof_data'], true);
            // echo json_encode($profileJSON);
            // exit;
            // $result = validate_profile($profileJSON);
            // echo json_encode($result);
            // die();
            // if (empty($_SESSION['result_prodpic'])){
            //     $_SESSION['result_prodpic'] = array('result' => true, 'error' => "", "data" => "/15_profile/1_profile/media/default-avatar.png");
            // }
            $pic = "http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/".substr($_SESSION['result_prodpic']['data'],75);
            // echo json_encode($result);
            // die();
            // if($result['result']) {
                // $username = $_SESSION['username'];
                $username = $profileJSON['puser'];
                $arrArgument = array(
                    'email' => $profileJSON['pemail'],
                    'name' => $profileJSON['pname'],
                    'phone' => $profileJSON['pphone'],
                    'avatar' => $pic,
                    'country' => $profileJSON['ppais'],
                    'province' => $profileJSON['provincia'],
                    'city' => $profileJSON['poblacion'],
                    'username' => $username
                );
                // $arrValue = false;
                $arrValue = loadModel(MODEL_PROFILE, "profile_model", "update_profile", $arrArgument);
                echo json_encode($arrValue);
                exit();
            // }
                
                // if ($arrValue){
                //     $message = "profile has been successfull registered";
                // }else{
                //     $message = "Problem ocurred registering a porduct";
                // }
        
                // $_SESSION['profile'] = $arrArgument;
                // $_SESSION['message'] = $message;
                // $callback="index.php?page=controller_profile&op=view";
        
                // $jsondata['success'] = true;
                // $jsondata['redirect'] = $callback;
                echo json_encode($jsondata);
                exit;
            // }else{
            //   $jsondata['success'] = false;
            //   $jsondata['error'] = $result['error'];
            // //   $jsondata['error_prodpic'] = $result_prodpic['error'];
        
            // //   $jsondata['success1'] = false;
            // //   if ($result_prodpic['result']) {
            // //       $jsondata['success1'] = true;
            // //       $jsondata['prodpic'] = $result_prodpic['data'];
            // //   }
            //   header('HTTP/1.0 400 Bad error');
            //   echo json_encode($jsondata);
            // }//End else
        }//End alta profiles

        public function delete_avatar() {
                //echo json_encode("Hello world from delete in controller_products.class.php");
                $_SESSION['result_prodpic'] = array();
                $result = remove_files();
                if($result === true){
                echo json_encode(array("res" => true));
                }else{
                echo json_encode(array("res" => false));
                }
            //echo json_decode($result);
        }

//////////////////////////////////////////////////////////////// load
        public function load_profile() {
                $jsondata = array();
                if (isset($_SESSION['profile'])) {
                    //echo debug($_SESSION['user']);
                    $jsondata["profile"] = $_SESSION['profile'];
                }
                if (isset($_SESSION['message'])) {
                    //echo $_SESSION['msje'];
                    $jsondata["message"] = $_SESSION['message'];
                }
                close_session();
                echo json_encode($jsondata);
                exit;
        }

        public function close_session() {
            unset($_SESSION['profile']);
            unset($_SESSION['message']);
            $_SESSION = array(); // Destruye todas las variables de la sesión
            session_destroy(); // Destruye la sesión
        }

/////////////////////////////////////////////////// load_country
        public function load_countries() {
                $json = array();
                $url = 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/backend/resources/countries.json';
                try {
                $json = loadModel(MODEL_PROFILE, "profile_model", "obtain_countries", $url);
                } catch (Exception $e) {
                    $json = array();
                }
                
                if($json){
                    echo $json;
                    exit;
                }else{
                    $json = "error";
                    echo $json;
                    exit;
                }
        }

/////////////////////////////////////////////////// load_provinces
        public function load_provinces() {
                $jsondata = array();
                $json = array();

                $json = loadModel(MODEL_PROFILE, "profile_model", "obtain_provinces");

                if($json){
                    $jsondata["provinces"] = $json;
                    echo json_encode($jsondata);
                    exit;
                }else{
                    $jsondata["provinces"] = "error";
                    echo json_encode($jsondata);
                    exit;
                }
        }

/////////////////////////////////////////////////// load_cities
        public function load_towns() {
            $jsondata = array();
            $json = array();

            $json = loadModel(MODEL_PROFILE, "profile_model", "obtain_cities", $_POST['idPoblac']);

            if($json){
                $jsondata["cities"] = $json;
                echo json_encode($jsondata);
                exit;
            }else{
                $jsondata["cities"] = "error";
                echo json_encode($jsondata);
                exit;
            }
        }
}