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

        public function upload_avatar() {
            $result_prodpic = upload_files();
            $_SESSION['result_prodpic'] = $result_prodpic;
            echo json_encode($result_prodpic);
        }


        public function alta_profile(){
            $jsondata = array();
            $profileJSON = json_decode($_POST['prof_data'], true);
            $pic = "http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/".substr($_SESSION['result_prodpic']['data'],75);
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
                $arrValue = loadModel(MODEL_PROFILE, "profile_model", "update_profile", $arrArgument);
                echo json_encode($arrValue);
                exit();
        }//End alta profiles

        public function delete_avatar() {
                $_SESSION['result_prodpic'] = array();
                $result = remove_files();
                if($result === true){
                echo json_encode(array("res" => true));
                }else{
                echo json_encode(array("res" => false));
                }
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