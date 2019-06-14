andiamo.controller('shopCtrl', function($scope, all_travels, localstorageService, services, toastr){
  console.log(all_travels);
	$scope.travels = all_travels;
	$scope.currentPage = 1;
	$scope.filter_travels = $scope.travels.slice(0,6);
	$scope.all_list = true;
	$scope.filter_list = false;
	$scope.bootpage = true;
	mostlikes();
  selectbox();
  
	$scope.pageChanged = function() {
    var startPos = ($scope.currentPage - 1) * 6;
		$scope.filter_travels = $scope.travels.slice(startPos, startPos + 6);
      };
      
      function selectbox(){
        services.put('shop','view_services').then(function (response) {
          $scope.services = response;
          console.log(response);
        });
      }

      var Cparking = 0;
      var Cwifi = 0;
      var Cpiscina = 0;
      var Cdesayuno = 0;
      $scope.checked = function(servicio) {
        if (servicio == 'Parking'){
          Cparking++;
        }else if(servicio == 'WIFI'){
          Cwifi++;   
        }else if(servicio == 'Piscina'){
          Cpiscina++;
        }else{
          Cdesayuno++;
        }
        if(Cparking % 2 == 1){
          var parking = true;
        }
        if(Cwifi % 2 == 1){
          var wifi = true;
        }
        if(Cpiscina % 2 == 1){
          var piscina = true;
        }
        if(Cdesayuno % 2 == 1){
          var desayuno = true;
        }

        services.put('shop','listar_servicios',{'Parking':parking, 'Wifi':wifi, 'Piscina':piscina, 'Desayuno':desayuno}).then(function (response) {
          $scope.list_some_services = response;
        });
      };

      function mostlikes(){
        services.put('shop','view_most_like').then(function (response) {
          $scope.most_like = response;
          // console.log(response);
        });
      }

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

      $scope.ver_servicios = function(){
        $scope.all_list = false;
        $scope.list_services = true;
        $scope.bootpage = false;
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
  mostlikes();
  selectbox();

  function selectbox(){
    services.put('shop','view_services').then(function (response) {
      $scope.services = response;
      console.log(response);
    });
  }

  function mostlikes(){
    services.put('shop','view_most_like').then(function (response) {
      $scope.most_like = response;
      // console.log(response);
    });
  }

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