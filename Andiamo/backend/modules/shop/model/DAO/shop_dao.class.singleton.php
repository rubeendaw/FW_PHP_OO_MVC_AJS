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
    //Contar cuantos hay de cada tipo
    function list_services_DAO($db){
        $sql = "SELECT 'Parking' AS 'Servicio', COUNT(services) AS 'cantidad' FROM travels WHERE services LIKE '%Parking%' UNION SELECT 'WIFI' AS 'Servicio', COUNT(services) AS 'cantidad' FROM travels WHERE services LIKE '%WIFI%' UNION SELECT 'Piscina' AS 'Servicio', COUNT(services) AS 'cantidad' FROM travels WHERE services LIKE '%Piscina%' UNION SELECT 'Desayuno' AS 'Servicio', COUNT(services) AS 'cantidad' FROM travels WHERE services LIKE '%Desayuno%'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    function list_most_like_DAO($db){
        $sql = "SELECT DISTINCT country FROM travels ORDER BY likes DESC LIMIT 4";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    function lista_services_DAO($db, $arrArgument){
        if ($arrArgument['Parking'] == 'Parking'){
            $parking = $arrArgument['Parking'];
        }else{
            $parking = 'false';
        }
        if ($arrArgument['Wifi'] == 'Wifi'){
            $wifi = $arrArgument['Wifi'];
        }else{
            $wifi = 'false';
        }
        if ($arrArgument['Piscina'] == 'Piscina'){
            $piscina = $arrArgument['Piscina'];
        }else{
            $piscina = 'false';
        }
        if ($arrArgument['Desayuno'] == 'Desayuno'){
            $desayuno = $arrArgument['Desayuno'];
        }else{
            $desayuno = 'false';
        }

        if (($parking == 'false') && ($wifi == 'false') && ($piscina == 'false') && ($desayuno == 'false')){
            $sql = "SELECT * FROM travels";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }else{
            $sql = "SELECT * FROM travels WHERE services LIKE '%$parking%' OR services LIKE '%$wifi%' OR services LIKE '%$piscina%' OR services LIKE '%$desayuno%'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

    }
}

