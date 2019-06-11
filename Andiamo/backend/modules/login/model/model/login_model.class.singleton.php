<?php
class login_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function insert_user($arrArgument){
        return $this->bll->insert_user_BLL($arrArgument);
    }

    public function insert_user_social($arrArgument){
        return $this->bll->insert_user_social_BLL($arrArgument);
    }

    public function exist_user($arrArgument){
        return $this->bll->exist_user_BLL($arrArgument);
    }

    public function mail_to($arrArgument){
        return $this->bll->mail_to_BLL($arrArgument);
    }

    public function update_passwd($arrArgument){
        return $this->bll->update_passwd_BLL($arrArgument);
    }

    public function select_token($arrArgument){
        return $this->bll->select_token_BLL($arrArgument);
    }

    public function type_user($arrArgument){
        return $this->bll->type_user_BLL($arrArgument);
    }

    public function reg_token($arrArgument){
        return $this->bll->reg_token_BLL($arrArgument);
    }

    public function search_token($arrArgument){
        return $this->bll->search_token_BLL($arrArgument);
    }
}
