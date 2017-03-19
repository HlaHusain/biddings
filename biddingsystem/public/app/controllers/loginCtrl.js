(function () {
    'use strict';
    angular
        .module('myApp')
        .controller('LoginController', LoginController);

    LoginController.$inject = ['$scope' , 'QueryService','$location'];



    function LoginController($scope,QueryService,$location) {
        if( sessionStorage.getItem("username") == '' || sessionStorage.getItem("username") == null  ){
        $scope.loginErrorText = '';
        $scope.loginError = false;

        $scope.login = function () {

            var credentials = {
                name: $scope.name,
                pass: $scope.pass
            }

            QueryService.query('POST', 'api/v1/user/login', credentials)
                .then(function(data) {

                    if (data.data == "Error trying to bind: Invalid credentials") {
                        console.log(data.data);
                        $scope.loginError = true;
                        $scope.loginErrorText = data.data;
                    } else {
                        var user=data.data;
                         var username =user.replace(/"(.+)"/g, '$1');
                        sessionStorage.setItem('username' , username);
                        $location.path("/all-bids-user");


                    }
                }, function(error) {
                    console.log(error);
                });


        }
    }else
        {
            $location.path("/all-bids-user");
        }

    }
    //
    // app.factory('Session', function($http) {
    //     var Session = {
    //         data: {},
    //         saveSession: function() { /* save session data to db */ },
    //         updateSession: function() {
    //             /* load data from db */
    //             $http.get('session.json')
    //                 .then(function(r) { return Session.data = r.data;})
    //         }
    //     };
    //     Session.updateSession();
    //     return Session;
    // });




})();
















//
//
// angular.module('boilerplate')
//     .controller('LoginController', [ 'QueryService' ,   function ($scope,QueryService) {
//         $scope.loginErrorText = '';
//         $scope.loginError = false;
//         console.log('test1');
//         $scope.login = function () {
//             var credentials = {
//                 name: $scope.name,
//                 pass: $scope.pass
//             }
//
//             console.log(credentials);
//             QueryService.query('post', 'api/v1/products/login', {get: query}, {post: params})
//                 .then(function(data) {
//                     console.log(data);
//                 }, function(error) {
//                     console.log(error);
//                 });
//
//
//         }
//     }]);
//
//
//






//
//
//
// angular
//     .module('boilerplate')
//     .controller('LoginController', LoginController);
//
// LoginController.$inject = [ 'QueryService'];
// function LoginController(QueryService) {
//     $scope.loginErrorText = '';
//     $scope.loginError = false;
//     console.log('test1');
//     $scope.login = function () {
//         var credentials = {
//             name: $scope.name,
//             pass: $scope.pass
//         }
//         console.log(credentials);
//
//
//     }
// }
//
//






//
// angular.module('boilerplate', [])
//     .controller('LoginController', [ 'QueryService' ,   function ($scope,QueryService) {
//         $scope.loginErrorText = '';
//         $scope.loginError = false;
//         console.log('test1');
//         $scope.login = function () {
//             var credentials = {
//                 name: $scope.name,
//                 pass: $scope.pass
//             }
//             console.log(credentials);
//
//
//         }
//     }]);
//
//
