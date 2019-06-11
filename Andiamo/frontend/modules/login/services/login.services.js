andiamo.factory("loginService", ['$location', '$rootScope', 'services','localstorageService',
function ($location, $rootScope, services,localstorageService, socialService) {
	var service = {};
	service.login = login;
	service.logout = logout;
    return service;

    function login() {
        var token = localstorageService.getUsers();
        var type = localstorageService.getType();
        console.log(token);
        if (token) {
            services.get('login', 'tipo',token).then(function (response) {
                console.log(response);

                if (response["type"] === '1') {
                    $rootScope.login_view = false;
                    $rootScope.profile_view = true;

	            } else if (response["type"] === '2') {
                    $rootScope.login_view = false;
                    $rootScope.profile_view = true;

	            }else{
                    $rootScope.login_view = true;
                }
            });
        } else {
            $rootScope.login_view = true;
        }
    }

    function logout() {
        localstorageService.clearUsers();
        var webAuth = new auth0.WebAuth({
            domain:       'pruebarubeendaw.eu.auth0.com',
            clientID:     'jrEyobV9Ews77U7mF6Q4WoS5k2fjdU7D'
          });
          
          webAuth.logout({
            returnTo: 'http://localhost/www/FW_PHP_OO_MVC_AJS/',
            client_id: 'jrEyobV9Ews77U7mF6Q4WoS5k2fjdU7D'
          });
    }
}]);
