(function(){

	angular.module('RouteStylesApp', ['ngRoute'])

		.constant('Routes', {
			route1: '/route-one',
			route2: '/route-two',
			route3: '/route-three'
		})

		.config(['$routeProvider', 'Routes', function($routeProvider, Routes){

			$routeProvider
                .when('/', {
                    templateUrl: 'partials/login.html',
                    controller: 'LoginController',
                    css: ['css/css.css','css/style.css'],
                    controllerAs: 'main'
                })
                .when('/new-bid', {
                    templateUrl: 'partials/newBidAdmin.html',
                    controller: 'formCtrl',
                    controllerAs: 'main'
                })
                .when('/running-bids-admin', {
                    templateUrl: 'partials/runningBidsAdmin.html',
                    controller: 'AdminRunningBidsCtrl',
                    controllerAs: 'main'
                })
                .when('/closed-bids-admin', {
                    templateUrl: 'partials/closedBidsAdmin.html',
                    controller: 'AdminClosedBidsCtrl',
                    controllerAs: 'main'
                })
                .when('/history-admin', {
                    templateUrl: 'partials/historyAdmin.html',
                    controller: 'historyCtrl',
                    controllerAs: 'main'
                })
                .when('/all-bids-user', {
                    templateUrl: 'partials/allBidsUser.html',
                    controller: 'user',
                    controllerAs: 'main'
                })
                .when('/opened-bids-user', {
                    templateUrl: 'partials/openedBidsUser.html',
                    controller: 'myRunningBids',
                    controllerAs: 'main'
                })
                .when('/closed-bids-user', {
                    templateUrl: 'partials/closedBidsUser.html',
                    controller: 'myClosedBids',
                    controllerAs: 'main'
                })
                .when('/login',{
                    templateUrl:"partials/login.html",
                    controller:"LoginController",
                    css: ['css/css.css','css/style.css'],
                    controllerAs: 'main'
                })
                .when('/logout',{
                    templateUrl:"partials/login.html",
                    controller:"LogoutController",
                    css: ['css/css.css','css/style.css'],
                    controllerAs: 'main'
                })


                .otherwise({
                    redirectTo:'/'
                });

		}])

		.controller('RouteStylesCtrl', ['$scope', 'Routes', function($scope, Routes){
			$scope.pageContent = '';
			$scope.routes = Routes;
		}])

		.controller('Route1Ctrl', ['$scope', function($scope){
			$scope.pageContent = 'This is the first route';
		}])

		.controller('Route2Ctrl', ['$scope', function($scope){
			$scope.pageContent = 'This is the second route';
		}])

		.controller('Route3Ctrl', ['$scope', function($scope){
			$scope.pageContent = 'This is the third route';
		}])

		.directive('head', ['$rootScope','$compile',
			function($rootScope, $compile){
				return {
					restrict: 'E',
					link: function(scope, elem){
						var html = '<link rel="stylesheet" ng-repeat="(routeCtrl, cssUrl) in routeStyles" ng-href="{{cssUrl}}" >';
						elem.append($compile(html)(scope));

                        scope.routeStyles = {};

						$rootScope.$on('$routeChangeStart', function (e, next, current) {

							if(current && current.$$route && current.$$route.css){
								if(!Array.isArray(current.$$route.css)){
									current.$$route.css = [current.$$route.css];
								}
								angular.forEach(current.$$route.css, function(sheet){
									scope.routeStyles[sheet] = undefined;
								});
							}

							if(next && next.$$route && next.$$route.css){
								if(!Array.isArray(next.$$route.css)){
									next.$$route.css = [next.$$route.css];
								}
								angular.forEach(next.$$route.css, function(sheet){
									scope.routeStyles[sheet] = sheet;
								});
							}

						});

					}
				};
			}
		]);




})();
