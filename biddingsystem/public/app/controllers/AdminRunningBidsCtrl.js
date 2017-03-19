var app=angular.module('myApp');

app.controller('AdminRunningBidsCtrl',AdminRunningBidsCtrl);
function AdminRunningBidsCtrl($scope,QueryService,$interval)
{

    QueryService.query('GET', 'api/v1/products/runningbids', {})
        .then(function(data) {
            console.log(data.data);
            $scope.myData=data.data;
        }, function(error) {
            console.log(error);
        });


    //
    // $scope.end_date = function (start, period, index) {
    //     var start_date = new Date(start);
    //     start_date = Date.parse(start_date);
    //     period = period * 60 * 60 * 1000;
    //     var end = new Date(start_date + period).toUTCString();
    //     $scope.myData[index]["EndDate"] = end;
    // }
    //
    // $scope.remaining = function (start, period,id, index) {
    //     $scope.myData[index]["Remaining"] = "Loading";
    //     var start_date = new Date(start);
    //     //console.log("before adding hours"+start);
    //     start_date = Date.parse(start_date);
    //     period = period * 60 * 60 * 1000;
    //     var end_date = start_date + period;
    //     //console.log(end_date);
    //     //console.log(start_date);
    //     // Set the date we're counting down to
    //     var countDownDate = new Date(end_date).getTime();
    //
    //     // Update the count down every 1 second
    //     $interval(function () {
    //         // Get todays date and time
    //         var now = new Date().getTime();
    //         // Find the distance between now an the count down date
    //         var distance = countDownDate - now;
    //
    //         // Time calculations for days, hours, minutes and seconds
    //         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    //         $scope.myData[index]["Remaining"] = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    //
    //     }, 1000);

    //}



}