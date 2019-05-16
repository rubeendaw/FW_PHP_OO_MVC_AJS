<?php
	function validate_data($data,$value){
		$error = array();
	    $valid = true;

		if ($value === 'login') {
			$filter = array(
		        'luser' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
		        ),
		        'lpasswd' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		        ),
		    );

		    $result = filter_var_array($data, $filter);
		    $data = exist_user($result['luser']);
	    	$data = $data[0];
	    	$activate = $data['activate'];
	    	$password = $data['password'];
		    if ($result != null && $result){
		        if(!$result['luser']){
		            $error['luser'] = "El formato del usuario es incorrecto";
		            $valid = false;
		        }
		        elseif(!$data){
		            $error['luser'] = "El usuario añadido no coincide con nuestros datos";
		            $valid = false;
		        }
		        elseif(!password_verify($result['lpasswd'],$password)){
		            $error['lpasswd'] = "Contraseña incorrecta";
		            $valid = false;
		        }elseif($activate == 0){
		            $error['luser'] = "Tienes que verificar el correo";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    }
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		    
		}elseif($value === 'register'){
			// $filter = array(
		    //     'ruser' => array(
		    //         'filter' => FILTER_VALIDATE_REGEXP,
		    //         'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
		    //     ),
		    //     'remail' => array(
		    //         'filter' => FILTER_VALIDATE_REGEXP,
		    //         'options' => array('regexp' => '/^^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/')
		    //     ),
		    //     'rpasswd' => array(
		    //         'filter' => FILTER_VALIDATE_REGEXP,
		    //         'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		    //     )
		    // );

		    // $result = filter_var_array($data, $filter);
		    // if ($result != null && $result){
		    //    	if(exist_user($result['ruser'])){
		    //         $error['ruser'] = "El usuario ya existe";
		    //         $valid = false;
		    //     }
		    // } else {
		    //     $valid = false;
		    // };
		    return $return = array('result' => true,'error' => $error, 'data' => $data);
			
		}elseif($value === 'uprofile'){
			$filter = array(
		        'pname' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z]{3,21}/')
		        ),
		        'psurname' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z ]{3,21}/')
		        ),
		        'pbirthday' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/')
		        ),
		    );

		    $result = filter_var_array($data, $filter);
		    if ($result != null && $result){
		        if(validate_birth($result['pbirthday'])){
		            $error['pbirthday'] = "Tienes que ser mayor de 16 años";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    };
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		    
		}elseif($value === 'rec_pass'){
		        if(!exist_user($data)){
		            $error['rpuser'] = "El usuario no existe";
		            $valid = false;
		        }
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		}
	}

	function generate_Token_secure($longitud){
		if ($longitud < 4) {
			$longitud = 4;
		}
		return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
	}

	// function exist_user($user){
	// 	return loadModel(MODEL_LOGIN,'login_model','exist_user',$user);
	// }

	// function validate_birth($date){
	// 	$thisdate = getdate();
	// 	$resultado = strtotime($thisdate['mon'] . "/" . $thisdate['mday'] . "/" . $thisdate['year']) - strtotime($date);
	// 	$oper=$resultado/(60*60*24);
	// 	if($oper < 5844){
	// 		return  true;
	// 	} else{
	// 		return false;
	// 	}
	// }
