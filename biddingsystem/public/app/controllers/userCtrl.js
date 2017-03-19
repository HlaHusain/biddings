
(function () {
    'use strict';
    angular
        .module('myApp')
        .controller('user', user);

    user.$inject = ['$scope' , 'QueryService','$interval','$location'];

    function user($scope,QueryService,$interval,$location) {
       // sessionStorage.getItem("username");
        QueryService.query('GET', 'api/v1/products/Uindex', {})
            .then(function (data) {

                $scope.myData = data.data;
                console.log(data.data);

            }, function (error) {
                console.log(error);
            });

        $scope.end_date = function (start, period, index) {
            var start_date = new Date(start);
            start_date = Date.parse(start_date);
            period = period * 60 * 60 * 1000;
            var end = new Date(start_date + period).toUTCString();
            $scope.myData[index]["EndDate"] = end;
        }

        $scope.remaining = function (start, period,id, index) {
            $scope.myData[index]["Remaining"] = "Loading";
            var start_date = new Date(start);
            //console.log("before adding hours"+start);
            start_date = Date.parse(start_date);
            period = period * 60 * 60 * 1000;
            var end_date = start_date + period;
            //console.log(end_date);
            //console.log(start_date);
            // Set the date we're counting down to
            var countDownDate = new Date(end_date).getTime();

            // Update the count down every 1 second
            $interval(function () {
                // Get todays date and time
                var now = new Date().getTime();
                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                $scope.myData[index]["Remaining"] = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

//  If the count down is over, write some text
                if (distance < 0) {
                    //clearInterval(x);
                    $scope.myData[index]["Remaining"] = "EXPIRED";

                  close(QueryService,id);
                }

            }, 1000);


        }//end of test function

// ..................................................................................
        $scope.inc = function(index,current,incrementUnit) {
            if( $scope.myData[index]["maxCurrentBid"]==null){

            }
            console.log(current,incrementUnit);
            var newCurrent=current+incrementUnit;
            $scope.myData[index]["maxCurrentBid"]=newCurrent;
        }

        $scope.dec = function(index,current,incrementUnit,price) {
            var newCurrent=current-incrementUnit;
            if(newCurrent<price )
                window.alert("Foreclosed bid at a lower price than the initial price ");
            else
                $scope.myData[index]["maxCurrentBid"]=newCurrent;
        }

        $scope.bid = function (index,BidID) {
            console.log(sessionStorage.getItem("username"));
             if(sessionStorage.getItem("username") == "" || sessionStorage.getItem("username") == null){
                $location.path("/login");
            }else {
                 confirm("you bid on " + $scope.myData[index]["productName"] + " with price " + $scope.myData[index]["maxCurrentBid"] + "$");
                 var newPrice=$scope.myData[index]["maxCurrentBid"];

                 var credentials = {
                    BidID: BidID,
                    username: sessionStorage.getItem("username"),
                    newPrice: newPrice
                }

                QueryService.query('post', 'api/v1/products/bidProduct', credentials)
                    .then(function (data) {
                        console.log(data.data);
                    }, function (error) {
                        console.log(error);
                    });

            }
        }
    }

    function close(QueryService,id){
        var credentials = {
            id: id,
        }

        QueryService.query('post', 'api/v1/products/close', credentials)
            .then(function (data) {
                console.log(data.data);
            }, function (error) {
                console.log(error);
            });
    }



})();





//
// angular
//     .module('myApp').controller('user',function($scope,$http){
//     $http.get('api/v1/products/Uindex').success(function(response){
//        // console.log(response);
//         $scope.myData = response;
//
//     });
//
//     $scope.test=function(start,period,index){
//
//         var start_date = new Date(start);
//
//         //console.log("before adding hours"+start);
//         start_date=Date.parse(start_date);
//         period=period*60*60*1000;
//         var end_date=start_date+period;
//         //console.log(end_date);
//         //console.log(start_date);
//         // Set the date we're counting down to
//         var countDownDate = new Date(end_date).getTime();
//         // Update the count down every 1 second
//         var x = setInterval(function() {
//
//             // Get todays date and time
//             var now = new Date().getTime();
//
//             // Find the distance between now an the count down date
//             var distance = countDownDate - now;
//
//             // Time calculations for days, hours, minutes and seconds
//             var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//             var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//             var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//             var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//
//             var remaining = document.getElementById('remaining'+index);
//             // Output the result in an element with id="demo"
//             remaining.innerHTML  = days + "d " + hours + "h "
//                 + minutes + "m " + seconds + "s ";
//             // If the count down is over, write some text
//             if (distance < 0) {
//                 clearInterval(x);
//                 document.getElementById("demo").innerHTML  == "EXPIRED";
//             }
//         }, 1000);
//
//     }
// // ..................................................................................
//     $scope.inc = function(index) {
//         var current=JSON.parse($scope.myData[index]["Current"]);
//         var incrementUnit=JSON.parse($scope.myData[index]["Increment"]);
//         var newCurrent=current+incrementUnit;
//         $scope.myData[index]["Current"]=newCurrent;
//         //window.alert(JSON.stringify($scope.myData[index]["increment"]));
//     }
//
//     $scope.dec = function(index) {
//         var started=JSON.parse($scope.myData[index]["Started"]);
//         var current=JSON.parse($scope.myData[index]["Current"]);
//
//         var decrementUnit=JSON.parse($scope.myData[index]["Increment"]);
//         var newCurrent=current-decrementUnit;
//         if(newCurrent<started )
//             window.alert("Foreclosed bid at a lower price than the initial price ");
//         else
//             $scope.myData[index]["Current"]=newCurrent;
//     }
//
//     $scope.bid = function(index) {
//         window.alert("you bid on "+$scope.myData[index]["Item"]+" with price "+$scope.myData[index]["Current"]+"$");
//     }
    // ..................................................................................
