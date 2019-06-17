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

    public function select_travel($arrArgument) {
        return $this->bll->select_travel_BLL($arrArgument);
    
    }

    public function list_search($arrArgument) {
        return $this->bll->list_search_BLL($arrArgument);
    }

    public function list_services() {
        return $this->bll->list_services_BLL();
    }

    public function list_most_like() {
        return $this->bll->list_most_like_BLL();
    }

    public function lista_services($arrArgument) {
        return $this->bll->lista_services_BLL($arrArgument);
    }

    public function travels_price($arrArgument) {
        return $this->bll->travels_price_BLL($arrArgument);
    }

}
