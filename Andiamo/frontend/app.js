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
		.when("/home/active_user/:token", {
			resolve: {
				recpass: function (services, $route) {
					console.log($route.current.params.token);
					return services.put('home','active_user',{'token':JSON.stringify({'token':$route.current.params.token})})
					.then(function(response){
						console.log(response);
						location.href = '#/';
					});
				}
			}
		})
		.when("/home/:tokenlog", {
			resolve: {
				function (localstorageService, $route, $timeout) {
					localstorageService.setUsers($route.current.params.tokenlog);
					localstorageService.setType("1");
					$timeout( function(){
						location.href = '#/';
					}, 1000 );
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
		.when("/contact", {
			templateUrl: "Andiamo/frontend/modules/contact/view/contact.view.html", 
			controller: "contactCtrl"
		})
		.when("/login", {
			templateUrl: "Andiamo/frontend/modules/login/view/login.view.html", 
			controller: "loginCtrl"
		})
		.when("/login/changepass/:token", {
			templateUrl: "Andiamo/frontend/modules/login/view/recpass.view.html",
			controller: "changepassCtrl"
		})
		.when("/profile", {
			templateUrl: "Andiamo/frontend/modules/profile/view/profile.view.html",
			controller: "profileCtrl",
			resolve: {
				infoUser: function (services,localstorageService) {
					return services.get('profile', 'print_user',localstorageService.getUsers());
				},
				likesUser: function (services,localstorageService) {
					return services.get('like', 'show_like',localstorageService.getUsers());
				}
			}
		})
		// .when("/logout", {
		// 	templateUrl: "Andiamo/frontend/modules/home/view/home.view.html",
		// 	controller: "logoutCtrl"		
		// })
		.otherwise({
			redirectTo: '/'
		});
}]);