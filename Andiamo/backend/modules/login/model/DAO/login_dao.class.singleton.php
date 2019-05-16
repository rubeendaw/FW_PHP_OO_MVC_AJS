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
            $password = crypt($arrArgument['rpasswd'], '$1$rasmusle$');
            $token = generate_Token_secure(20);
            // $tokenlog = md5(uniqid(rand(),true));
            $img = 'https://api.adorable.io/avatars/25/'.$email.'.png';

            $sql = "INSERT INTO users(IDuser,username,password,token,email,type,avatar) 
            VALUES('$user','$user','$password','$token','$email',1,'$img')";
            $db->ejecutar($sql);
            return $token;
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
