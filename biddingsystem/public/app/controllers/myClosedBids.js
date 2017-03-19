/**
 * Created by hhamra on 3/15/2017.
 */
var app=angular.module('myApp');

app.controller('myClosedBids',myClosedBids);
function myClosedBids($scope,QueryService)
{
    var username = {
        username: sessionStorage.getItem("username")
    }


    QueryService.query('POST', 'api/v1/products/myclosedbids',username)
        .then(function(data) {
            console.log(data.data);
            $scope.myData=data.data;
        }, function(error) {
            console.log(error);
        });

}