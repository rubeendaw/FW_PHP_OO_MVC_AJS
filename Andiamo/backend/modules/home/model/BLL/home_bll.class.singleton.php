<?php
class home_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = home_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    
    public function select_all_type_BLL(){
        return $this->dao->select_all_type_DAO($this->db);
    }
    
    public function select_all_country_BLL($arrArgument){
        return $this->dao->select_all_country_DAO($this->db, $arrArgument);
    }
    
    public function select_all_destination_BLL($arrArgument){
        return $this->dao->select_all_destination_DAO($this->db, $arrArgument);
    }
    
    public function select_all_travels_BLL(){
      return $this->dao->select_all_travels_DAO($this->db);
    }

    public function select_filter_BLL($arrArgument){
        return $this->dao->select_filter_DAO($this->db, $arrArgument);
      }

    public function select_search_BLL($arrArgument){
        return $this->dao->select_search_DAO($this->db, $arrArgument);
      }

    public function select_name_BLL($arrArgument){
        return $this->dao->select_name_DAO($this->db, $arrArgument);
      }
      public function active_user_BLL($arrArgument){
        return $this->dao->active_user_DAO($this->db,$arrArgument);
      }
}
