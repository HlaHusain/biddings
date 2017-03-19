/**
 * Created by hhamra on 3/16/2017.
 */
(function () {
    'use strict';
    angular
        .module('myApp')
        .controller('LogoutController', LogoutController);

    LogoutController.$inject = ['$location','$window'];

    function LogoutController($location,$window) {
        $window.sessionStorage["username"] = "";
        $location.path("/login");


    }

})();



