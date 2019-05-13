var andiamo = angular.module('andiamo', ['ngRoute', 'toastr', 'ui.bootstrap']);
andiamo.config(['$routeProvider',
	function ($routeProvider) {
		$routeProvider
		.when("/", {templateUrl: "Andiamo/frontend/modules/home/view/home.view.html", controller: "homeCtrl",
            resolve: {
				names: function (services) {
					return services.get('home','load_names');
				},
				all_travels: function (services) {
					return services.get('home','show_travels');
					}
        }
		})
		.when("/shop/:id", {
			templateUrl: "Andiamo/frontend/modules/shop/view/shop.view.html",
			controller: "shopFilterCtrl",
			resolve: {
				list_search: function (services, $route) {
					return services.get('shop', 'list_search', $route.current.params.id);
				}
			}
		})
		.when("/shop", {
			templateUrl: "Andiamo/frontend/modules/shop/view/shop.view.html",
			controller: "shopCtrl",
			resolve: {
				all_travels: function (services) {
					return services.get('shop', 'show_travels');
				}
			}
		})
		.when("/contact", {templateUrl: "Andiamo/frontend/modules/contact/view/contact.view.html", controller: "contactCtrl"})
		.otherwise({
			redirectTo: '/'
		});
}]);