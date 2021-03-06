<?php
class like_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = like_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function show_like_BLL($arrArgument){
      return $this->dao->show_like_DAO($this->db, $arrArgument);
    }

    public function delete_like_BLL($arrArgument){
        return $this->dao->delete_like_DAO($this->db, $arrArgument);
    }
  
    public function insert_like_BLL($arrArgument){
     return $this->dao->insert_like_DAO($this->db, $arrArgument);
     }

    public function delete_like_BLL2($arrArgument){
        return $this->dao->delete_like_DAO2($this->db, $arrArgument);
    }
  
    public function insert_like_BLL2($arrArgument){
     return $this->dao->insert_like_DAO2($this->db, $arrArgument);
     }
  
}
