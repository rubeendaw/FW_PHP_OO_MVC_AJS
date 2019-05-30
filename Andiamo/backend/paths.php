<?php
//PROYECTO
define('PROJECT', '/www/FW_PHP_OO_MVC_AJS/Andiamo/backend/');

//PROYECTO PATH
define('PROJECT_PATH', '/www/FW_PHP_OO_MVC_AJS/');

// $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
// define('SITE_ROOT', $path);

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

//SITE_PATH
define('SITE_PATH_ANG', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_PATH);

//CSS
define('CSS_PATH', SITE_PATH . 'view/assets/css/');

//FONTS
define('FONTS_PATH', SITE_PATH . 'view/assets/fonts/icomoon/');

//JS
define('JS_PATH', SITE_PATH . 'view/assets/js/');

//plugins
// define('JS_PLUGINS', SITE_PATH . 'view/plugins/');

//IMG
define('IMG_PATH', SITE_PATH . 'view/assets/images/');

//IMG PROFILE
define('MEDIA_PATH', SITE_ROOT . 'view/assets/images/profile/');

//IMG FLAGS
define('FLAGS_PATH', SITE_PATH . 'view/assets/images/flags/');

//libs
define('LIBS', SITE_ROOT . 'libs/');

//log
// define('USER_LOG_DIR', SITE_ROOT . 'log/user/Site_User_errors.log');
// define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

define('PRODUCTION', true);

//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//view
define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
// define('VIEW_PATH_INC_ERROR', SITE_ROOT . 'view/inc/templates_error/');
//modules
define('MODULES_PATH', SITE_ROOT . 'modules/');
//resources
define('RESOURCES', SITE_ROOT . 'resources/');
//media
// define('MEDIA_PATH', SITE_ROOT . 'media/');
//utils
define('UTILS', SITE_ROOT . 'utils/');

//translations
define('TRANSLATIONS', SITE_PATH . 'translations/');


//TEST
define('TEST_JS_PATH', SITE_PATH . 'modules/test/view/js/');
//module profile
define('PROFILE_JS_PATH', SITE_PATH . 'modules/profile/view/js/');
define('FUNCTIONS_PROFILE', SITE_ROOT . 'modules/profile/utils/');
define('UTILS_PROFILE', SITE_ROOT . 'modules/profile/utils/');
define('MODEL_PROFILE', SITE_ROOT . 'modules/profile/model/model/');
define('DAO_PROFILE', SITE_ROOT . 'modules/profile/model/DAO/');
define('BLL_PROFILE', SITE_ROOT . 'modules/profile/model/BLL/');

//module like
define('LIKE_JS_PATH', SITE_PATH . 'modules/like/view/js/');
define('MODEL_LIKE', SITE_ROOT . 'modules/like/model/model/');
define('DAO_LIKE', SITE_ROOT . 'modules/like/model/DAO/');
define('BLL_LIKE', SITE_ROOT . 'modules/like/model/BLL/');

//module contact
define('CONTACT_JS_PATH', SITE_PATH . 'modules/contact/view/js/');

//module home
define('HOME_JS_PATH', SITE_PATH . 'modules/home/view/js/');
define('UTILS_HOME', SITE_ROOT . 'modules/home/utils/');
define('DAO_HOME', SITE_ROOT . 'modules/home/model/DAO/');
define('BLL_HOME', SITE_ROOT . 'modules/home/model/BLL/');
define('MODEL_HOME', SITE_ROOT . 'modules/home/model/model/');

//module shop
define('SHOP_JS_PATH', SITE_PATH . 'modules/shop/view/js/');
define('UTILS_SHOP', SITE_ROOT . 'modules/shop/utils/');
define('DAO_SHOP', SITE_ROOT . 'modules/shop/model/DAO/');
define('BLL_SHOP', SITE_ROOT . 'modules/shop/model/BLL/');
define('MODEL_SHOP', SITE_ROOT . 'modules/shop/model/model/');

//module login
define('LOGIN_JS_PATH', SITE_PATH . 'modules/login/view/js/');
define('UTILS_LOGIN', SITE_ROOT . 'modules/login/utils/');
define('DAO_LOGIN', SITE_ROOT . 'modules/login/model/DAO/');
define('BLL_LOGIN', SITE_ROOT . 'modules/login/model/BLL/');
define('MODEL_LOGIN', SITE_ROOT . 'modules/login/model/model/');

//amigables
define('URL_AMIGABLES', TRUE);
