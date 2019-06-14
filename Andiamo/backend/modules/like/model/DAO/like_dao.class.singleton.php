<?php
class like_DAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function insert_like_DAO($db, $arrArgument) {
        $id = $arrArgument['id'];
        $token = $arrArgument['token'];
        $sql = "INSERT INTO likes VALUES($id,(SELECT IDuser FROM users WHERE tokenlog = '$token'))";
        return $db->ejecutar($sql);
    }

    public function insert_like_DAO2($db, $arrArgument) {
        $id = $arrArgument['id'];
        $sql = "UPDATE travels SET likes = (likes + 1) WHERE id = $id";
        return $db->ejecutar($sql);
    }

    public function show_like_DAO($db, $arrArgument) {

        $sql = "SELECT id, country, destination, price FROM travels WHERE id IN (SELECT travel FROM likes WHERE username = (SELECT IDuser FROM users WHERE tokenlog = '$arrArgument'))";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function delete_like_DAO($db, $arrArgument) {
        $id = $arrArgument['id'];
        $token = $arrArgument['token'];
        $sql = "DELETE FROM likes WHERE travel = $id AND username = (SELECT IDuser FROM users WHERE tokenlog = '$token')";
        return $db->ejecutar($sql);
    }

    public function delete_like_DAO2($db, $arrArgument) {
        $id = $arrArgument['id'];
        $sql = "UPDATE travels SET likes = (likes - 1) WHERE id = $id";
        return $db->ejecutar($sql);
        // return $sql;
    }

}
