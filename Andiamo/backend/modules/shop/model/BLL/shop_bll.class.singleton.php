<?php
class shop_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = shop_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function select_all_travels_BLL(){
      return $this->dao->select_all_travels_DAO($this->db);
    }

    public function select_travel_BLL($arrArgument){
      return $this->dao->select_travel_DAO($this->db, $arrArgument);
    }

    public function list_search_BLL($arrArgument){
      return $this->dao->list_search_DAO($this->db, $arrArgument);
    }

    public function list_services_BLL(){
      return $this->dao->list_services_DAO($this->db);
    }

    public function list_most_like_BLL(){
      return $this->dao->list_most_like_DAO($this->db);
    }

    public function lista_services_BLL($arrArgument){
      return $this->dao->lista_services_DAO($this->db, $arrArgument);
    }

}
