<?php
class home_DAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
		function select_all_travels_DAO($db){
			$sql = "SELECT * FROM travels";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }
        
        function select_search_DAO($db,$arrArgument) {
            $sql = "SELECT DISTINCT * FROM travels WHERE destination LIKE '%$arrArgument%'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function select_name_DAO($db) {
            $sql = "SELECT DISTINCT country FROM travels";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

		function select_travel($ref){
			$sql = "SELECT * FROM travels WHERE id='$ref'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
		}

		public function select_all_type_DAO($db){
			$sql = "SELECT DISTINCT type FROM travels";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
		}
		
		function select_all_country_DAO($db, $arrArgument){
			$sql = "SELECT DISTINCT country FROM travels WHERE type='$arrArgument'";
			$stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
		}
		
		function select_all_destination_DAO($db, $arrArgument){
            $tecla_pulsada = $arrArgument['service'];
            $types = $arrArgument['types'];
            $country = $arrArgument['country'];

			$sql = "SELECT * FROM travels WHERE type='$types' AND country='$country' AND destination LIKE '" . $tecla_pulsada . "%' GROUP BY id";
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
