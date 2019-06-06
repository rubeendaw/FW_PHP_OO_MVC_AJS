andiamo.controller('profileCtrl', function($scope, loginService, infoUser, likesUser, load_ubication, services, toastr, $timeout, localstorageService) {
    $scope.logout = function(){
        loginService.logout();
    }
    $scope.userInfo = infoUser;
    $scope.userLikes = likesUser;
    $scope.avatar = infoUser.avatar;
    console.log(infoUser);

    load_ubication.load_countries().then(function (response) {
        if(response.success){
            $scope.paises = response.datas;
        }else{
            $scope.AlertMessage = true;
            $scope.user.pais_error = "Error al recuperar la informacion de paises";
            $timeout(function () {
                $scope.user.pais_error = "";
                $scope.AlertMessage = false;
            }, 2000);
        }
    });

    $scope.resetPais = function () {
        if ($scope.userInfo.pais.code == 'ES') {
            load_ubication.load_provinces()
            .then(function (response) {
                if(response.success){
                    $scope.provincias = response.datas;
                }else{
                    $scope.AlertMessage = true;
                    $scope.user.prov_error = "Error al recuperar la informacion de provincias";
                    $timeout(function () {
                        $scope.user.prov_error = "";
                        $scope.AlertMessage = false;
                    }, 2000);
                }
            });
            $scope.poblaciones = null;
        } /*else { //en ng-disabled
            $scope.provincias = null;
            $scope.poblaciones = null;
        }*/
    };

    $scope.resetValues = function () {
        var datos = {idPoblac: $scope.userInfo.provincia.id};
        load_ubication.load_towns(datos)
        .then(function (response) {
            if(response.success){
                $scope.poblaciones = response.datas;
                // console.log(response);
            }else{
                $scope.AlertMessage = true;
                $scope.user.pob_error = "Error al recuperar la informacion de poblaciones";
                $timeout(function () {
                    $scope.user.pob_error = "";
                    $scope.AlertMessage = false;
                }, 2000);
            }
        });
    };

    //dropzone
    $scope.dropzoneConfig = {
        'options': {
            'url': 'Andiamo/backend/index.php?module=profile&function=upload_avatar',
            addRemoveLinks: true,
            maxFileSize: 1000,
            dictResponseError: "Ha ocurrido un error en el server",
            acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd'
        },
        'eventHandlers': {
            'sending': function (file, formData, xhr) {},
            'success': function (file, response) {
                response = JSON.parse(response);
                // console.log(response.data);
                if (response.result) {
                    $(".msg").addClass('msg_ok').removeClass('msg_error').text('Success Upload image!!');
                    $('.msg').animate({'right': '300px'}, 300);
                } else {
                    $(".msg").addClass('msg_error').removeClass('msg_ok').text(response['error']);
                    $('.msg').animate({'right': '300px'}, 300);
                }
            },
            'removedfile': function (file, serverFileName) {
                if (file.xhr.response) {
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    var data = jQuery.parseJSON(file.xhr.response);
                    services.post("profile", "delete_avatar", JSON.stringify({'filename': data.data}));
                }
            }
    }};

    $scope.hola = function () {
        console.log("Hola");
    };
    
    $scope.update_profile = function () {
        // console.log($scope.userInfo.avatar);
		services.put('profile','alta_profile',{'prof_data':JSON.stringify({'pname':$scope.userInfo.name, 'pemail': $scope.userInfo.email, 'pphone': $scope.userInfo.phone, 'ppais': $scope.userInfo.pais.name, 'provincia':$scope.userInfo.provincia.nombre, 'poblacion': $scope.userInfo.poblacion.poblacion, 'puser': infoUser.IDuser})}).then(function (response) {
            console.log(response);
			if (response === 'true') {
				toastr.success('Cambios guardados correctamente', 'Perfecto',{
                    closeButton: true
                });
                // $uibModalInstance.dismiss('cancel');
                $timeout( function(){
		            location.href = '#/';
		            location.href = '#/profile';
		        }, 1500 );
			}
		});
    };
    
    $scope.deletelike = function (id) {
        console.log(id);
        token = localstorageService.getUsers();
		services.put('like','del_like',{'id':id, 'token':token}).then(function (response) {
            console.log(response);
			if (response === 'true') {
                toastr.success('LIKE Borrado', 'LIKE',{
                    closeButton: true
                });
                $timeout( function(){
                    location.reload(true);
                  }, 1000 );
			}else{
                toastr.error('No se ha podido borrar', 'LIKE',{
                    closeButton: true
                });
            }
		});
    };
    // console.log(likesUser);
    
});