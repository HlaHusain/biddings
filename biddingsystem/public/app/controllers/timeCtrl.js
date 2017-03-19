var app=angular.module('boilerplate',[])
    .controller('TimerCtrl',function($scope,$interval){
        var c=0;
        $scope.message="This DIV is refreshed "+c+" time.";
        $interval(function(){
            $scope.message="This DIV is refreshed "+c+" time.";
            c++;

            $http.get('api/v1/products/checkTime').success(function(response) {
                console.log('test');
                // console.log(response);
            });





            },period);
    });