<?php
class like_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = like_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function show_like($arrArgument) {
        return $this->bll->show_like_BLL($arrArgument);
    }

    public function delete_like($arrArgument){
        return $this->bll->delete_like_BLL($arrArgument);
    }

    public function insert_like($arrArgument){
        return $this->bll->insert_like_BLL($arrArgument);
    }

    public function delete_like2($arrArgument){
        return $this->bll->delete_like_BLL2($arrArgument);
    }

    public function insert_like2($arrArgument){
        return $this->bll->insert_like_BLL2($arrArgument);
    }

}
