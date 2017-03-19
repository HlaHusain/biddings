/**
 * Created by hhamra on 3/15/2017.
 */
var app=angular.module('myApp');
app.controller('historyCtrl',historyCtrl);
function historyCtrl($scope,QueryService)
{

    QueryService.query('GET', 'api/v1/products/history', {})
        .then(function(data) {
            //console.log(data);
            $scope.myData=data.data;
        }, function(error) {
            console.log(error);
        });








}