andiamo.factory("localstorageService", ['$timeout', '$filter', '$q', function ($timeout, $filter, $q) { 
	var service = {};
	service.getUsers = getUsers;
    service.setUsers = setUsers;
	service.getType = getType;
    service.setType = setType;
    service.clearUsers = clearUsers;
	return service;

    function getUsers() {
        if(!localStorage.token){
            localStorage.token = JSON.stringify(false);
        }
        return JSON.parse(localStorage.token);
    }

    function getType() {
        if(!localStorage.type){
            localStorage.type = JSON.stringify(false);
        }
        return JSON.parse(localStorage.type);
    }
    
    function setUsers(token) {
        localStorage.token = JSON.stringify(token);
    }

    function setType(type) {
        localStorage.type = JSON.stringify(type);
    }
    
    function clearUsers() {
        localStorage.token = JSON.stringify(false);
        localStorage.type = JSON.stringify(false);
    }

}]);