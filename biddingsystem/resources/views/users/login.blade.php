<!DOCTYPE html>
<html lang="en" ng-csp="" ng-app="boilerplate" >
<head>
    <meta charset="UTF-8">
    <title>Login form shake effect</title>
    <base href="/">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bidding System</title>
    <meta name="description" content="Simple AngularJS Boilerplate to kick start your new project with SASS support and Gulp watch/build tasks">

    <!-- mobile meta -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!--[if IE]>
    <link rel="shortcut icon" href="favicon.ico">
    <![endif]-->
    <!-- or, set /favicon.ico for IE10 win -->
    <meta name="msapplication-TileColor" content="#f01d4f">

    <!-- CSS -->
    <!-- build:css css/style.min.css -->
    <!-- <link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
    <!-- endbuild -->

    <!--Bootstarp components  .......................... -->
    <!--    <link rel="stylesheet" type="text/css" href="styles/bootstrap/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- endbuild -->


    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="/css/style.css">

    <!--Bootstarp components  .......................... -->
    <!--    <link rel="stylesheet" type="text/css" href="styles/bootstrap/bootstrap.min.css" />-->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    {{--<!-- endbuild -->--}}

</head>

<body>


<div  ng-controller="LoginController">

    <div class="login-form">
        <h1> Bidding System </h1>
        <div class="alert-danger art" ng-if="loginError" role="alert">
            <span ng-bind="loginErrorText"></span>
        </div>
        <form name="form" class="form" ng-submit="login()" role="form">
            <div class="form-group">
                <i class="fa fa-user"></i>
                <input type="text" name="name" id="username" class="form-control" ng-model="name" placeholder="Username " required />
                {{--<span ng-show="form.name.$error.required" class="help-block">Username is required</span>--}}
            </div>
            <div class="form-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="pass" id="password" class="form-control" ng-model="pass" placeholder="Password" required />
                {{--<span ng-show="form.pass.$error.required" class="help-block">Password is required</span>--}}
            </div>
            <div class="form-actions">
                <button type="submit" ng-disabled="form.$invalid" class="log-btn logbtn" >Login</button>
            </div>
        </form>
    </div>
</div>













{{--<div class="login-form">--}}
    {{--<h1> Bidding System </h1>--}}
    {{--<div class="form-group ">--}}
        {{--<input type="text" class="form-control" placeholder="Username " id="UserName">--}}
        {{--<i class="fa fa-user"></i>--}}
    {{--</div>--}}
    {{--<div class="form-group log-status">--}}
        {{--<input type="password" class="form-control" placeholder="Password" id="Passwod">--}}
        {{--<i class="fa fa-lock"></i>--}}
    {{--</div>--}}
    {{--<span class="alert">Invalid Credentials</span>--}}
    {{--<a class="link" href="#">Lost your password?</a>--}}
    {{--<button type="button" class="log-btn" >Log in</button>--}}


{{--</div>--}}
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- Angular components -->
<!-- build:appcomponents js/appcomponents.js -->

<script type="text/javascript" src="angular/angular.js"></script>
<script type="text/javascript" src="angular-route/angular-route.min.js"></script>
<script type="text/javascript" src="angular-sanitize/angular-sanitize.js"></script>



<!--AngularJS-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>-->

<!-- endbuild -->
{{--<script type="text/javascript" src="app/app.js"></script>--}}
<script type="text/javascript" src="app/services/authService.js"></script>
{{--<script type="text/javascript" src="app/factories/factory.js"></script>--}}
<!-- endbuild -->

<!-- Application sections -->
<!-- build:mainapp js/mainapp.js -->
<script type="text/javascript" src="app/controllers/loginCtrl.js"></script>

<!-- <script type="text/javascript" src="app/components/controllers/testCtrl.js"></script>
-->

<!-- <script src="app/countdown.js"></script> -->
<!-- endbuild -->

<!-- templates from $templateCache -->
<!-- build:templates -->
<!-- endbuild -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>

</body>
</html>
