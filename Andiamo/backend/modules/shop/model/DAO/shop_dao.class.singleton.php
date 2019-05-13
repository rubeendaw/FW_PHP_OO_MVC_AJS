<?php
class shop_DAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function list_search_DAO($db,$arrArgument) {
        $sql = "SELECT DISTINCT * FROM travels WHERE country LIKE '%$arrArgument%'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
		function select_all_travels_DAO($db){
			$sql = "SELECT * FROM travels";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

		function select_travel_DAO($db, $arrArgument){
			$sql = "SELECT * FROM travels WHERE id='$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }
        
		function select_filter_DAO($db, $arrArgument){
            $type = $arrArgument['types'];
            $country = $arrArgument['country'];
            $destination = $arrArgument['destination'];
			$sql = "SELECT DISTINCT * FROM travels WHERE type='$type' AND country='$country' AND destination='$destination'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
		}
}
