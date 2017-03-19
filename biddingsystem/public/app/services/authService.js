

;(function() {

    angular
      .module('myApp')
      .factory('AuthService', [
        '$http', '$q',  AuthService
      ]);


function AuthService($http, $q ,AuthService  ) {

    var service = {
        query: query
    };

    return service;


    //////////////// definition

    function query(method, url, params, data) {
        console.log('test2');
        var deferred = $q.defer();

        $http({
            method: method,
            url:  url,
            params: params,
            data: data
        }).then(function(data) {
            if (!data.config) {
                console.log('Server error occured.');
            }
            deferred.resolve(data);
        }, function(error) {
            deferred.reject(error);
        });

        return deferred.promise;
    }

}


})();
