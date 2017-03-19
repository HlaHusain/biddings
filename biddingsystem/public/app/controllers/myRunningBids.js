/**
 * Created by hhamra on 3/15/2017.
 */
var app=angular.module('myApp');

app.controller('myRunningBids',myRunningBids);
function myRunningBids($scope,QueryService)
{
    var username = {
        username: sessionStorage.getItem("username")
    }
    QueryService.query('POST', 'api/v1/products/mybids', username)
        .then(function(data) {
            console.log(data.data);
            $scope.myData=data.data;
           console.log(data.productDesc);
        }, function(error) {
            console.log(error);
        });

}