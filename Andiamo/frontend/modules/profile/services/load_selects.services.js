andiamo.factory("load_ubication", ['services', '$q',
function (services, $q) {
    var service = {};
    service.load_countries = load_countries;
    service.load_provinces = load_provinces;
    service.load_towns = load_towns;
    return service;

    function load_countries() {
        var deferred = $q.defer();
        services.get("profile", "load_countries", true).then(function (data) {
            // console.log(data);
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_pais" });
            } else {
                deferred.resolve({ success: true, datas: data });
                //$.each(data, function (i, valor) {
                    //console.log(valor.sName);
                    //console.log(valor.sISOCode);
                //});
            }
        });
        return deferred.promise;
    };
    
    function load_provinces() {
        var deferred = $q.defer();
        services.get("profile", "load_provinces", true).then(function (data) {
            // console.log(data);
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_provincias" });
            } else {
                deferred.resolve({ success: true, datas: data.provinces });
                //$.each(data.provincias, function (i, valor) {
                    //console.log(valor.id);
                    //console.log(valor.nombre);
                //});
            }
        });
        return deferred.promise;
    };
    
    function load_towns(datos) {
        var deferred = $q.defer();
        services.post("profile", "load_towns", datos).then(function (data) {
            // console.log(data);
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_poblaciones" });
            } else {
                deferred.resolve({ success: true, datas: data.cities });
                //$.each(data.poblaciones, function (i, valor) {
                    //console.log(valor.poblacion);
                //});
            }
        });
        return deferred.promise;
    };
}]);
