andiamo.controller('shopCtrl', function($scope, all_travels, localstorageService, services, toastr){
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
      
      $scope.Search = function(){
        if ($scope.busqueda.travel) {
          travel = $scope.busqueda.travel;
          console.log(travel);
        }else if($scope.busqueda){
          travel = $scope.busqueda;
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

      $scope.myshop = true;
      $scope.detalles = false;

      $scope.volver = function(){
        location.reload(true);
        $scope.detalles = false;
        $scope.myshop = true;
        $scope.bootpage = true;
      };
      
      $scope.details = function(id){
        services.post('shop','view_shop_details',{'id':id}).then(function (response) {
          console.log(response);
          $scope.list_detail = response[0];
          $scope.detalles = true;
          $scope.myshop = false;
          $scope.bootpage = false;
        });
      };
      
});
andiamo.controller('shopFilterCtrl', function ($scope, list_search, services) {
  $scope.list = list_search;
	$scope.filter_list = true;
  $scope.all_list = false;
  $scope.detalles = false;
  $scope.myshop = true;

  $scope.volver = function(){
    location.reload(true);
    $scope.detalles = false;
    $scope.myshop = true;
    $scope.bootpage = true;
  };
  
  $scope.details = function(id){
    services.post('shop','view_shop_details',{'id':id}).then(function (response) {
      console.log(response);
      $scope.list_detail = response[0];
      $scope.detalles = true;
      $scope.myshop = false;
      $scope.bootpage = false;
    });
  };

});