andiamo.controller('loginCtrl', function($scope, services, toastr, $timeout, localstorageService, loginService) {
	$scope.submitRegister = function(){
		var data = {'ruser':$scope.register.user,'remail':$scope.register.email,'rpasswd':$scope.register.password};
		console.log(data);
		services.post('login','validate_register',{'total_data':JSON.stringify(data)}).then(function (response) {
			if (response.success) {
				toastr.success('Revisa tu correo electronico', 'Perfecto',{
					closeButton: true
                });
                $timeout( function(){
					location.href = '#/';
		        }, 3000 );
			}else{
				console.log(response);
				toastr.error(response.error.ruser, 'Error',{
                	closeButton: true
            	});
			}
		});
	}

	$scope.submitLogin = function(){
		services.put('login','validate_login',
		{'total_data':JSON.stringify({'luser':$scope.login.user,'lpasswd':$scope.login.password})})
		.then(function (response) {
			// console.log($scope.login.user);
			if (response.result == true) {
				console.log(response);
					localstorageService.setUsers(response.tokenlog);
					localstorageService.setType(response.type);
					toastr.success('Inicio de sesion correcto', 'Perfecto',{
                    closeButton: true
                });
                $timeout( function(){
                	loginService.login();
		            location.href = '#/';
		        }, 3000 );
			}else{
				console.log(response);
				if(response.error){
					toastr.error('Error', 'Error',{
						closeButton: true
					});
				}
			}
		});
	};

	$scope.submitrecPass = function(){
		var user = $scope.recover.user;
		console.log(user);
		services.post('login','send_mail_rec',{'rpuser':JSON.stringify(user)}).then(function (response) {
			if (response.success) {
				toastr.success('Revisa tu correo electronico', 'Perfecto',{
					closeButton: true
                });
                $timeout( function(){
					location.href = '#/';
		        }, 3000 );
			}else{
				console.log(response);
				toastr.error(response.error.rpuser, 'Error',{
                	closeButton: true
            	});
			}
		});
	}
});

andiamo.controller('changepassCtrl', function($scope,services,$route,toastr,$timeout) {
	$scope.RecPass = function(){
		// console.log($scope.recpass.password2);
		services.put('login','update_passwd',
		{'rec_pass':JSON.stringify({'recpass':$scope.recpass.password,'token':$route.current.params.token})})
		.then(function (response) {
			console.log(response);
			if (response) {
					toastr.success('Contraseña cambiada correctamente', 'Perfecto',{
                    closeButton: true
                });
                $timeout( function(){
		            location.href = '#/';
		        }, 1000 );
			}else{
				toastr.error('Error al cambiar la contraseña', 'Error',{
                	closeButton: true
            	});
			}
		});
	}
});
