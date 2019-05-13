<?php
class home_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_all_type() {
        return $this->bll->select_all_type_BLL();
    }

    public function select_all_country($arrArgument) {
        return $this->bll->select_all_country_BLL($arrArgument);
    }

    public function select_all_destination($arrArgument) {
        return $this->bll->select_all_destination_BLL($arrArgument);
    }

    public function select_all_travels() {
        return $this->bll->select_all_travels_BLL();
    }

    public function select_filter($arrArgument) {
        return $this->bll->select_filter_BLL($arrArgument);
    }

    public function select_search($arrArgument) {
        return $this->bll->select_search_BLL($arrArgument);
    }

    public function select_name($arrArgument) {
        return $this->bll->select_name_BLL($arrArgument);
    }
}
