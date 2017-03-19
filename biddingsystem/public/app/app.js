
/**
 *
 * AngularJS Boilerplate
 * @description           Description
 * @author                Jozef Butko // www.jozefbutko.com/resume
 * @url                   www.jozefbutko.com
 * @version               1.1.7
 * @date                  March 2015
 * @license               MIT
 *
 */
// ;(function() {
//
//
//     /**
//      * Definition of the main app module and its dependencies
//      */
//     angular
//         .module('boilerplate', [
//             'ngRoute',
//
//         ])
//         .config(config);
//
//     // safe dependency injection
//     // this prevents minification issues
//     config.$inject = ['$routeProvider', '$locationProvider', '$httpProvider', '$compileProvider'];
//
//     /**
//      * App routing
//      *
//      * You can leave it here in the config section or take it out
//      * into separate file
//      *
//      */
//     function config($routeProvider, $locationProvider, $httpProvider, $compileProvider) {
//
//        // $locationProvider.html5Mode(false);
//
//         // routes
//         $routeProvider
//             .when('/home', {
//                 templateUrl: 'partials/home.html',
//                 controller: 'user',
//             })
//             .when('/setup', {
//                 templateUrl: 'views/setup.html',
//                 controller: 'MainController',
//                 controllerAs: 'main'
//             })
//             .otherwise({
//                 redirectTo: '/'
//             });
//
//         $httpProvider.interceptors.push('authInterceptor');
//
//     }
//
//
//     /**
//      * You can intercept any request or response inside authInterceptor
//      * or handle what should happend on 40x, 50x errors
//      *
//      */
//     angular
//         .module('boilerplate')
//         .factory('authInterceptor', authInterceptor);
//
//     authInterceptor.$inject = ['$rootScope', '$q', 'LocalStorage', '$location'];
//
//     function authInterceptor($rootScope, $q, LocalStorage, $location) {
//
//         return {
//
//             // intercept every request
//             request: function(config) {
//                 config.headers = config.headers || {};
//                 return config;
//             },
//
//             // Catch 404 errors
//             responseError: function(response) {
//                 if (response.status === 404) {
//                     $location.path('/');
//                     return $q.reject(response);
//                 } else {
//                     return $q.reject(response);
//                 }
//             }
//         };
//     }
//
//
//     /**
//      * Run block
//      */
//     angular
//         .module('boilerplate')
//         .run(run);
//
//     run.$inject = ['$rootScope', '$location'];
//
//     function run($rootScope, $location) {
//
//         // put here everything that you need to run on page load
//
//     }
//
//
// })();
//
//

















;(function() {

    angular
        .module('boilerplate', []);


    /**
     * Definition of the main app module and its dependencies
     */

    angular
        .module('boilerplate', [
            'ngRoute',
        ])
        .config(config);
    // safe dependency injection
    // this prevents minification issues

    config.$inject = ['$routeProvider', '$locationProvider', '$httpProvider' ];
    /**
     * App routing
     *
     * You can leave it here in the config section or take it out
     * into separate file
     *
     */
    function config($routeProvider, $locationProvider, $httpProvider ) {

        $locationProvider.html5Mode(false);
        // routes
        $routeProvider
            .when('/', {
                templateUrl: 'partials/home.html',
                controller: 'MainController',
                controllerAs: 'main'
            })
            .when('/home', {
                templateUrl: 'partials/home.html',
                controller: 'user',
            })
            .when('/login', {
                templateUrl: 'partials/login.html',
                controller: 'LoginController',

            })
            .otherwise({
                redirectTo: '/'
            });

      //  $httpProvider.interceptors.push('authInterceptor');

    }


    /**
     * You can intercept any request or response inside authInterceptor
     * or handle what should happend on 40x, 50x errors
     *
     */
    angular
        .module('boilerplate')
        .factory('authInterceptor', authInterceptor);

    authInterceptor.$inject = ['$rootScope', '$q', 'LocalStorage', '$location'];

    function authInterceptor($rootScope, $q, LocalStorage, $location) {

        return {

            // intercept every request
            request: function(config) {
                config.headers = config.headers || {};
                return config;
            },

            // Catch 404 errors
            responseError: function(response) {
                if (response.status === 404) {
                    $location.path('/');
                    return $q.reject(response);
                } else {
                    return $q.reject(response);
                }
            }
        };
    }


    /**
     * Run block
     */
    angular
        .module('boilerplate')
        .run(run);

    run.$inject = ['$rootScope', '$location'];

    function run($rootScope, $location) {

        // put here everything that you need to run on page load

    }


})();
//
//
//
//
//
//
//
//
//
//

    // angular
    //     .module('boilerplate', []);


    /**
     * Definition of the main app module and its dependencies
     */

//     angular
//         .module('boilerplate', [
//             'ngRoute',
//         ])
//         .config(config);
//     // safe dependency injection
//     // this prevents minification issues
//
//     config.$inject = ['$routeProvider', '$locationProvider', '$httpProvider', '$compileProvider'];
//
//     console.log('hih1');
//     function config($routeProvider,$httpProvider, $compileProvider) {
//         console.log('hih2');
//         // routes
//         $routeProvider
//
//
//             .when('/home', {
//
//                 templateUrl: 'partials/home.html',
//                 controller: 'user',
//             })
//             .when('/home', {
//                 templateUrl: '../resources/views/home.html',
//                 controller: 'user',
//             })
//             .when('/all-bids', {
//                 templateUrl: 'views/all-bids.html',
//                 controller: 'MainController',
//                 controllerAs: 'main'
//             })
//             .when('/my-opened-bids', {
//                 templateUrl: 'views/my-opened-bids.html',
//                 controller: 'MainController',
//                 controllerAs: 'main'
//             })
//             .when('/my-closed-bids', {
//                 templateUrl: 'views/my-closed-bids.html',
//                 controller: 'MainController',
//                 controllerAs: 'main'
//             })
//             .otherwise({
//                 redirectTo: 'api/v1/products/'
//             });
//
//         $httpProvider.interceptors.push('authInterceptor');
//
//     }
//     /**
//      * You can intercept any request or response inside authInterceptor
//      * or handle what should happend on 40x, 50x errors
//      *
//      */
//     angular
//         .module('boilerplate')
//         .factory('authInterceptor', authInterceptor);
//
//     authInterceptor.$inject = ['$rootScope', '$q', '$location'];
//
//     function authInterceptor($rootScope, $q, LocalStorage, $location) {
//
//         return {
//
//             // intercept every request
//             request: function(config) {
//                 config.headers = config.headers || {};
//                 return config;
//             },
//
//             // Catch 404 errors
//             responseError: function(response) {
//                 if (response.status === 404) {
//                     $location.path('/');
//                     return $q.reject(response);
//                 } else {
//                     return $q.reject(response);
//                 }
//             }
//         };
//     }
//     /**
//      * Run block
//      */
//     angular
//         .module('boilerplate')
//         .run(run);
//
//     run.$inject = ['$rootScope', '$location'];
//
//     function run($rootScope, $location) {
//
//         // put here everything that you need to run on page load
//
//     }
// })();
//
//
//
//
//
//
//
//
//
//
//
//
//
//
