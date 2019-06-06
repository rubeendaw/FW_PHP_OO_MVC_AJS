andiamo.controller('shopCtrl', function($scope, all_travels, localstorageService, services, toastr){
    // console.log(list_search);
    console.log(all_travels);
	$scope.travels = all_travels;
	$scope.currentPage = 1;
	$scope.filter_travels = $scope.travels.slice(0,6);
	$scope.all_list = true;
	$scope.filter_list = false;
	$scope.bootpage = true;
	
	$scope.pageChanged = function() {
		var startPos = ($scope.currentPage - 1) * 6;
		$scope.filter_travels = $scope.travels.slice(startPos, startPos + 6);
      };
      
      $scope.selectSearch = function(){
        if ($scope.busqueda.travel) {
            travel = $scope.busqueda.travel;
          console.log(travel);
        }else if($scope.busqueda){
            travel = $scope.travel;
        }else{
            console.log("hola2");
          }
          if (travel) {
            // console.log(name);
            location.href = '#/shop/'+travel;
        }
      }

      $scope.insertlike = function (id) {
        // console.log($scope.userInfo.avatar);
        token = localstorageService.getUsers();
		    services.put('like','ins_like',{'id':id, 'token':token}).then(function (response) {
          console.log(response);
          if (response === 'true') {
              toastr.success('LIKE Guardado', 'LIKE',{
              closeButton: true
              });
          }else{
            toastr.info('Ya le has dado LIKE', 'LIKE',{
            closeButton: true
            });
          }
		    });
    };
    

    //     name = name.toLowerCase();
    //     list_search.forEach(function(data){
    //         if(data.name.toLowerCase().indexOf(name) !== -1){
    //             list_tarvel.push(data);
    //         }
    //     });
        
    //         if (list_tarvel.length === 1) {
    //             $scope.data = list_tarvel;
    //             $scope.filter_travels = list_tarvel.slice(0,6);
    //             $scope.filter_list = false;
    //             // $scope.detailsV = true;
    //             $scope.bootpage = false;
    //         }else if (list_tarvel.length > 1){
    //             $scope.adoptions = list_tarvel;
    //             $scope.filterDogs = list_tarvel.slice(0,6);
    //             $scope.filter_list = true;
    //             // $scope.detailsV = false;
    //             $scope.bootpage = true;
    //         }else{
    //             toastr.error('No hay coincidencias con la busqueda', 'Sin resultados',{
    //                 closeButton: true
    //             });
    //         }
    // }
});
andiamo.controller('shopFilterCtrl', function ($scope, list_search) {
    $scope.list = list_search;
	$scope.filter_list = true;
	$scope.all_list = false;

});