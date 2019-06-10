<?php
function validate_profile($value){

    $error = array();
    $valid = true;

    if ($value != null && $value){
        if(!$value['email']){
            $error['email'] = "El correo no es valido";
            $valid = false;
        }
    } else {
        $valid = false;
    };

    return $return = array('result' => $valid, 'error' => $error, 'data' => $value );
}//End of function validate product

