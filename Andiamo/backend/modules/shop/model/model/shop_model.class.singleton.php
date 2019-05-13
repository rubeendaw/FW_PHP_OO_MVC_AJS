<?php
class shop_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = shop_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_all_travels() {
        return $this->bll->select_all_travels_BLL();
    }

    public function select_filter($arrArgument) {
        return $this->bll->select_filter_BLL($arrArgument);
    }

    public function select_travel($arrArgument) {
        return $this->bll->select_travel_BLL($arrArgument);
    
    }
    public function list_search($arrArgument) {
        return $this->bll->list_search_BLL($arrArgument);
    }

}
