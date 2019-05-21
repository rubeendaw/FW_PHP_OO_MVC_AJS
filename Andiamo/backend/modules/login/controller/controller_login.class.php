<?php
class controller_login {
    public function __construct() {
        $_SESSION['module'] = "login";
		include(UTILS_LOGIN . "functions_login.inc.php");
    }

    function validate_login(){
        $info_data = json_decode($_POST['total_data'],true);
        $response = validate_data($info_data,'login');
        if ($response['result']) {
            $data = loadModel(MODEL_LOGIN,'login_model','select_token',$info_data['luser']);
            $data = $data[0];
            $data['success'] = true;
            echo json_encode($data);
        }else{
            $jsondata['success'] = false;
             $jsondata['error'] = $response['error'];
            echo json_encode($jsondata);
        }
    }
    
    function validate_register(){
        $info_data = json_decode($_POST['total_data'],true);
        $response = validate_data($info_data,'register');

        // $token1 = generate_Token_secure(20);
        if ($response['result']) {
            $result['token'] = loadModel(MODEL_LOGIN, "login_model", "insert_user", $info_data);
            if ($result) {
                $result['type'] = 'alta';
                $result['inputEmail'] = $info_data['remail'];
                $result['inputMessage'] = 'Para activar tu cuenta en Andiamo pulse en el siguiente enlace';
                $result['success'] = true;
                enviar_email($result);
            }
            echo json_encode($result);
        }else{
            $jsondata['success'] = false;
             $jsondata['error'] = $response['error'];
             echo json_encode($jsondata);
        }
    }

    function send_mail_rec(){
        $user_rpass = json_decode($_POST['rpuser'],true);
        $result = validate_data($user_rpass,'rec_pass');
        if ($result['result']) {
            $result = loadModel(MODEL_LOGIN,'login_model','mail_to',$user_rpass);
            $result = $result[0];
            $result['token'] = $result['token'];
            $result['inputEmail'] = $result['email'];
            if ($result) {
                $result['type'] = 'changepass';
                $result['inputMessage'] = 'Para recuperar tu contraseña pulse en el siguiente enlace';
                enviar_email($result);
                $result['success'] = true;
                echo json_encode($result);
            }else{
                echo "error";
            }
        }else{
            $jsondata['success'] = false;
             $jsondata['error'] = $result['error'];
            echo json_encode($jsondata);
        }
    }
    
    function update_passwd(){
        $pass_data = json_decode($_POST['rec_pass'],true);
        if ($pass_data) {
            $result = loadModel(MODEL_LOGIN,'login_model','update_passwd',$pass_data);
            echo json_encode($result);
        }else{
            $jsondata = false;
            echo json_encode($jsondata);	
        }
    }

}




    // $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    // include($path . "modules/login/model/DAOlogin.php");
    // @session_start();
    // switch($_GET['op']){
    //     case 'view':
    //         include("modules/login/view/login.html");
    //         break;
            
    //     case 'login':
    //     try {
    //         $daologin = new DAOlogin();
    //         $rdo = $daologin->select_user($_POST['usernamel']);
    //         // $travel=get_object_vars($rdo);
    //         // echo $travel;
    //         // exit();
    //     } catch (Exception $e) {
    //         echo "error";
    //         exit();
    //     }
    //     if(!$rdo){
    //         echo "error_user";
    //         exit();
    //     }else{
    //         $value = get_object_vars($rdo);
    //         if (password_verify($_POST['passwordl'],$value['password'])) {
    //             echo 'ok';
    //             $_SESSION['type_user'] = $value['type'];
    //             $_SESSION['username'] = $value['username'];
    //             $_SESSION['avatar'] = $value['avatar'];
    //             $_SESSION['tiempo'] = time();
    //             exit();
    //         }else {
    //             echo "error_user";
    //             exit();
    //         }
    //     }	
    //     break;
            
    //     case 'register':
    //         // $valide = validate_register();
    //         // if($valide['result']){
    //             try {
    //                 $daologin = new DAOlogin();
    //                 $pass_hash = password_hash($_POST['passwordr'], PASSWORD_DEFAULT);
    //                 $rdocompuseremail = $daologin->comprobar_user_email_register($_POST['usernamer'],$_POST['emailr']);
    //                 // $rdocompemail = $daologin->comprobar_email_register($_POST['emailr']);
    //             } catch (Exception $e) {
    //                 echo "Error al registrarse";
    //                 exit();
    //             }
    //             if($rdocompuseremail == true){
    //                 echo "error_reg";
    //                 exit();
    //             }else{ 
    //                 $rdo = $daologin->nuevo_user($_POST['usernamer'], $pass_hash, $_POST['emailr']);
    //                 if(!$rdo){
    //                     echo "error_reg";
    //                     exit();
    //                 }else{
    //                     if (isset($_SESSION['purchase']) && $_SESSION['purchase'] === 'on'){
    //                         echo 'okay';
    //                         exit();
    //                     }else{
    //                         echo 'ok';
    //                         exit();	
    //                     }
    //                 }	
    //             }
    //         // }else{
    //         //     echo $valide['error'];
    //         //     exit();
    //         // }
	// 	break;

    //     case 'logout':
    //     unset($_SESSION['type_user']);
    //     unset($_SESSION['username']);
    //     session_destroy();
    //     $callback = 'index.php?page=controller_login&op=view';
    //     die('<script>window.location.href="'.$callback .'";</script>');
    //     break;

    //     case 'gravatar':
    //     $datos = array(
    //         "avatar" => $_SESSION['avatar'],
    //         "username" => $_SESSION['username'],
    //     );
    //     echo json_encode ($datos);
    //     // $avatar = $_SESSION['avatar'];
    //     // $user = $_SESSION['username'];

    //     break;

    //     case 'time':
	// 		if (!isset($_SESSION["tiempo"])) {  
    // 	  		echo "activo";
	// 		}else{  
	//     		if((time() - $_SESSION["tiempo"]) >= 1000) {  
	//     	  		echo "inactivo"; 
	//     	  		exit();
	// 			}else{
	// 				echo "activo";
	// 				exit();
	// 			}
	// 		}
	// 	break;

    //     case 'regenid':
    //         session_regenerate_id();
    //         exit();
    //     break;

    //     default;
    //         include("view/inc/error404.php");
    //         break;
    // }
