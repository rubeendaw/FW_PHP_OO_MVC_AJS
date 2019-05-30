andiamo.controller('profileCtrl', function($scope,loginService) {
    $scope.logout = function(){
        loginService.logout();
    }
    
});