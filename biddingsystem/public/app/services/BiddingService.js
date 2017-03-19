


angular
    .module('boilerplate')
    .service('BiddingService',function($http, $q){
        console.log("inside service");
        var deferred=$q.defer();
        var bidding_data;

        $http.get('data1.json').then(function(response)
        {
            deferred.resolve(response);
        });
        console.log('test33');
        this.getBiddings=function(){
            console.log ('you called getBiddings()');
            return deferred.promise;
        }

    })
