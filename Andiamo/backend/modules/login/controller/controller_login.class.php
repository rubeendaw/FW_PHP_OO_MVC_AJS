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
            $data = loadModel(MODEL_LOGIN,'login_model','select_token',$response['data']['luser']);
            $data = $data[0];
            $arrArgument = array(
                'result' => true,
                'tokenlog' => $data['tokenlog'],
                'type' => $data['type']
            );
            // echo json_encode($data['type']);
            // exit();
            // $data['success'] = true;
            echo json_encode($arrArgument);
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

    function social_login(){
        $login = login_social();
        // echo json_encode($login);
        // exit();
    }

    function social_datos(){
        $datos = datos_social();
        $data = json_decode(json_encode($datos),true);
        // echo json_encode($datos);
        // exit();
        $type_red = explode("|",$data['sub']);
        // print_r($data);
        if($type_red[0] == "google-oauth2"){
            $nick = "goo_".$data['nickname'];
            $exist = exist_user($nick);
            if(!$exist){
                $arrArgument = array(
                    'user' => $nick,
                    'name' => $data['name'],
                    // 'email' => $_SESSION['destination'],
                    'avatar' => $data['picture']
                );
                loadModel(MODEL_LOGIN, "login_model", "insert_user_social", $arrArgument);
                $result = loadModel(MODEL_LOGIN, "login_model", "select_token", $arrArgument);
                $tokenlog = $result['tokenlog'];
                $url = SITE_PATH_ANG . "#/home/$tokenlog";
                redirect($url);
            }else{
                $tokenlog = encode_jwt($nick);
                $url = SITE_PATH_ANG . "#/home/$tokenlog";
                redirect($url);
            }
                
        }elseif($type_red[0] == "github"){
            $nick = "git_".$data['nickname'];
            $exist = exist_user($nick);
            if(!$exist){
        // if(!$exist){
                $arrArgument = array(
                    'user' => $nick,
                    'name' => $data['nickname'],
                    // 'email' => $data['name'],
                    'avatar' => $data['picture']
                );
                loadModel(MODEL_LOGIN, "login_model", "insert_user_social", $arrArgument);
                $result = loadModel(MODEL_LOGIN, "login_model", "select_token", $arrArgument);
                $tokenlog = $result['tokenlog'];
                $url = SITE_PATH_ANG . "#/home/$tokenlog";
                redirect($url);
            }else{
                $tokenlog = encode_jwt($nick);
                $url = SITE_PATH_ANG . "#/home/$tokenlog";
                redirect($url);
            }
        }else{
            print_r("Red Social no valida.");
        }        
            // print_r("YA REGISTRADO");
            //login$result = loadModel(MODEL_LOGIN, "login_model", "insert_user_social", $arrArgument);
    }
    function logout(){
        $url = 'https://pruebarubeendaw.eu.auth0.com/v2/logout';
        redirect($url);
    }


}