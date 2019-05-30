<?php
class login_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = login_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function insert_user_BLL($arrArgument){
        return $this->dao->insert_user_DAO($this->db,$arrArgument);
    }

    public function insert_user_social_BLL($arrArgument){
        return $this->dao->insert_user_social_DAO($this->db,$arrArgument);
    }

    public function exist_user_BLL($arrArgument){
        return $this->dao->exist_user_DAO($this->db,$arrArgument);
    }

    public function mail_to_BLL($arrArgument){
        return $this->dao->mail_to_DAO($this->db,$arrArgument);
    }
      
    public function update_passwd_BLL($arrArgument){
        return $this->dao->update_passwd_DAO($this->db,$arrArgument);
    }

    public function select_token_BLL($arrArgument){
        return $this->dao->select_token_DAO($this->db,$arrArgument);
    }
}
