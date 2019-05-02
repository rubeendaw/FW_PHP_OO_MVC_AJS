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
    
    public function select_filter_BLL($arrArgument){
      return $this->dao->select_filter_DAO($this->db, $arrArgument);
    }

    public function select_travel_BLL($arrArgument){
      return $this->dao->select_travel_DAO($this->db, $arrArgument);
    }
}
