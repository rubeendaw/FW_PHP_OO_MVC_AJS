andiamo.controller('homeCtrl', function($scope, names, all_travels, $timeout, services) {
console.log(all_travels);
    cont=3
    $scope.index = 0;
    $scope.names = names;
    console.log(names);
    $scope.travels = all_travels.slice(0,cont);
    $scope.showMore = function(){
        cont=cont+2;
        $scope.travels = all_travels.slice(0,cont);
        if (cont == 5) {
          var prov = document.querySelector('#click_scroll');
          prov.remove();
        }
      }

      $scope.selectSearch = function(){
        if ($scope.busqueda.name) {
          name = $scope.busqueda.name;
          console.log(name);
        }else if($scope.busqueda){
            name = $scope.busqueda;
        }else{
            console.log("hola2");
          }
          if (name) {
            // console.log(name);
            location.href = '#/shop/'+name;
        //   services.get('home', 'select_search',name).then(function (response) {
        //     $scope.travel = response;
        //   });
        }
      }
});