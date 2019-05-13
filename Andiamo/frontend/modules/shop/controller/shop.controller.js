andiamo.controller('shopCtrl', function($scope, all_travels){
    // console.log(list_search);
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

	//   $scope.selectSearch = function(){
    //     list_tarvel = [];
    //     if ($scope.busqueda.name) {
	// 		name = $scope.busqueda.name;
	// 		console.log(name);
    //     }else if($scope.busqueda){
    //         name = $scope.busqueda;
    //     }

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