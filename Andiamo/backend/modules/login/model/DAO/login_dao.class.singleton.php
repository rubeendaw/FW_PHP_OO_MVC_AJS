<?php
class login_DAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // function recovery_user($user){
	// 		$sql = "UPDATE `users` SET password = '$user[password]' WHERE `username` = '$user[username]'";

	// 		$conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql);
    //         Conectar::close($conexion);
    //         return $res;
	// 	}

    // function comprobar_user_recovery($user){
    //     $sql = "SELECT * FROM `users` WHERE `username` = '$user[username]'";

    //     $conexion = Conectar::con();
    //           $res = mysqli_query($conexion, $sql);
    //           Conectar::close($conexion);
    //           if( mysqli_num_rows( $res ) > 0 ){
    //               return true;
    //           }
    //           return false;
    //       }

    // function select_user($user){
	// 		$sql = "SELECT * FROM `users` WHERE `username` = '$user'";

	// 		$conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql)->fetch_object();
    //         Conectar::close($conexion);
    //         return $res;
	// 	}

    // function comprobar_user_login($user){
    //     $sql = "SELECT * FROM `users` WHERE `username` = '$user[usernamel]'";

    //     $conexion = Conectar::con();
    //           $res = mysqli_query($conexion, $sql);
    //           Conectar::close($conexion);
    //           if( mysqli_num_rows( $res ) > 0 ){
    //               return true;
    //           }
    //           return false;
    //       }

    function insert_user_DAO($db,$arrArgument){
            $user = $arrArgument['ruser'];
            $email = $arrArgument['remail'];
            // $hash = '$2y$07$BCryptRequires2';
            // $password = password_hash($arrArgument['rpasswd'], $hash);
            $password = $arrArgument['rpasswd'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $token = generate_Token_secure(20);
            // $tokenlog = md5(uniqid(rand(),true));
            $img = 'https://api.adorable.io/avatars/25/'.$email.'.png';

            $sql = "INSERT INTO users(IDuser,username,password,token,email,type,avatar) 
            VALUES('$user','$user','$hashed_password','$token','$email',1,'$img')";
            $db->ejecutar($sql);
            return $token;
        }
        
    function exist_user_DAO($db,$arrArgument) {
        $sql = "SELECT password,activate,tokenlog,IDuser FROM users WHERE IDuser = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    function mail_to_DAO($db,$arrArgument) {
        $sql = "SELECT email,token FROM users WHERE IDuser = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    function update_passwd_DAO($db,$arrArgument) {
        // $hash = '$2y$07$BCryptRequires2';
        // $pass = password_hash($arrArgument['recpass'], $hash);
        $pass = $arrArgument['recpass'];
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $token = $arrArgument['token'];
        $sql = "UPDATE users SET password = '$hashed_password' WHERE token = '$token'";
        return $db->ejecutar($sql);
    }

    // public function update_token($db,$arrArgument) {
    //     $tokenlog = generate_Token_secure(20);
    //     $sql = "UPDATE users SET tokenlog = '$tokenlog' WHERE IDuser = '$arrArgument'";
    //     return $db->ejecutar($sql);
    // }

    function select_token_DAO($db,$arrArgument) {
        $tokenlog = generate_Token_secure(20);
        $sql1 = "UPDATE users SET tokenlog = '$tokenlog' WHERE IDuser = '$arrArgument'";
        $db->ejecutar($sql1);
        
        $sql = "SELECT tokenlog FROM users WHERE IDuser = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    // function comprobar_user_register($user){
    //     $sql = "SELECT * FROM `users` WHERE username = '$user'";
    //         $conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql);
    //         Conectar::close($conexion);
    //         if( mysqli_num_rows( $res ) > 0 ){
    //             return true;
    //         }
    //         return false;
    //     }
        
    // function comprobar_user_email_register($user, $email){
    //     $sql = "SELECT * FROM `users` WHERE username = '$user' OR email ='$email'";
    //         $conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql);
    //         Conectar::close($conexion);
    //         if( mysqli_num_rows( $res ) > 0 ){
    //             return true;
    //         }
    //         return false;
	// 	}
    // function comprobar_email_register($email){
    //     $sql = "SELECT * FROM `users` WHERE email = '$email'";
    //         $conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql);
    //         Conectar::close($conexion);
    //         if( mysqli_num_rows( $res ) > 0 ){
    //             return true;
    //         }
    //         return false;
	// 	}
}
