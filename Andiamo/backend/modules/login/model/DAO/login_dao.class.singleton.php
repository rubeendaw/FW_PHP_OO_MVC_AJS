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


    function insert_user_DAO($db,$arrArgument){
            $user = $arrArgument['ruser'];
            $email = $arrArgument['remail'];
            $hash = '$2y$07$BCryptRequires2';
            // $password = password_hash($arrArgument['rpasswd'], $hash);
            $password = $arrArgument['rpasswd'];
            
            $hashed_password = password_hash($arrArgument['rpasswd'], PASSWORD_DEFAULT);
            $token = generate_Token_secure(20);
            // $tokenlog = md5(uniqid(rand(),true));
            $img = 'https://api.adorable.io/avatars/25/'.$email.'.png';

            $sql = "INSERT INTO users(IDuser,username,password,token,email,type,avatar) 
            VALUES('$user','$user','$hashed_password','$token','$email',1,'$img')";
            $db->ejecutar($sql);
            return $token;
        }

    function insert_user_social_DAO($db,$arrArgument){
            $user = $arrArgument['user'];
            $name = $arrArgument['name'];
            $avatar = $arrArgument['avatar'];
            // $token = generate_Token_secure(20);
            // $tokenlog = md5(uniqid(rand(),true));
            $tokenlog = encode_jwt($user);
            $sql = "INSERT INTO users(IDuser,username,tokenlog,type,name,avatar,activate) 
            VALUES('$user','$user','$tokenlog',1,'$name','$avatar',1)";
            return $db->ejecutar($sql);
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
        // $pass = $arrArgument['rec_pass'];
        $hashed_password = password_hash($arrArgument['pass'], PASSWORD_DEFAULT);
        // $pass = crypt($arrArgument['recpass'], '$1$rasmusle$');
        $token = $arrArgument['token'];
        $sql = "UPDATE users SET password = '$hashed_password' WHERE token = '$token'";
        return $db->ejecutar($sql);
    }


    function select_token_DAO($db,$arrArgument) {
        $tokenlog = encode_jwt($arrArgument);
        $sql1 = "UPDATE users SET tokenlog = '$tokenlog' WHERE IDuser = '$arrArgument'";
        $db->ejecutar($sql1);
        
        $sql = "SELECT type,tokenlog FROM users WHERE IDuser = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

}
