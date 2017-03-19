<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Simple Angular APP</title>
    <script scr="js/route-styles.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/main.css" >

    <base href="/">
</head>

<body class="main-wrapper">

<!-- Navigation  -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/all-bids-user">Home</a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">My Biddings<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#/opened-bids-user">Opened Biddings</a></li>
                        <li><a href="#/closed-bids-user">Closed Biddings</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
<!--                <li ><a  href="#/running-bids-admin">Admin</a></li>-->
                <li><a href="#/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="#/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

            </ul>
        </div>
    </div>
</nav>

<div data-ng-view="" class="container"></div>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="https://code.angularjs.org/1.2.8/angular-route.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript" src="app/controllers/timeCtrl.js"></script>
<script type="text/javascript" src="app/controllers/userCtrl.js"></script>
<script type="text/javascript" src="app/controllers/controller.js"></script>
<script type="text/javascript" src="app/controllers/loginCtrl.js"></script>
<script type="text/javascript" src="app/controllers/formCtrl.js"></script>
<script type="text/javascript" src="app/controllers/historyCtrl.js"></script>
<script type="text/javascript" src="app/controllers/AdminRunningBidsCtrl.js"></script>
<script type="text/javascript" src="app/controllers/AdminClosedBidsCtrl.js"></script>
<script type="text/javascript" src="app/controllers/myRunningBids.js"></script>
<script type="text/javascript" src="app/controllers/myClosedBids.js"></script>
<script type="text/javascript" src="app/controllers/LogoutController.js"></script>
<script type="text/javascript" src="app/services/authService.js"></script>
<script type="text/javascript" src="app/services/queryService.service.js"></script>
</body>


<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>

</html>