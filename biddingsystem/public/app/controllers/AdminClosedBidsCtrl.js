/**
 * Created by hhamra on 3/15/2017.
 */
var app=angular.module('myApp');

app.controller('AdminClosedBidsCtrl',AdminClosedBidsCtrl);
function AdminClosedBidsCtrl($scope,QueryService)
{

    QueryService.query('GET', 'api/v1/products/closedbids', {})
        .then(function(data) {
            console.log(data.data);
            $scope.myData=data.data;
        }, function(error) {
            console.log(error);
        });

}