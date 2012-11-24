<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-responsive.min.css') }}
    {{ HTML::style('css/darkstrap.css') }}
    {{ HTML::style('css/screen.css') }}

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div class="container-fluid">
    <div class="row-fluid" id="header">
        <div id="logo" class="span6">
            <div class="clientName">Creative Acceleration</div>
            <div id="dashboardHeader">gemini</div>
        </div>
        <div id="projectListView span6">

        </div>
    </div>

    <div id="centralNav">
        <div class="row-fluid">
            <div class="span12">
                <a href="http://apple.com1" class="active">Overview</a>
                <a href="http://apple.com2">Time Logs</a>
                <a href="http://apple.com3">Change Orders</a>
            </div>
        </div>
        <div class="row-fluid">
            <div class="navLine">
                <div id="positionIndicator"></div>
            </div>
        </div>
    </div>
    <div id="legal">
        <? echo HTML::image('img/geminiLogo.png', "Gemini Logo");?>

    </div>
    <div class="row-fluid">
        <div id='slider'>
            <ul>
                <li style='display:block' id="projectOverview" class="page1">
                    <div class="span7">
                        @yield('jason')
                    </div>
                    <div class="span5">

                    </div>
                </li>
                <li style='display:none'>Page 2</li>
                <li style='display:none'>Page 3</li>
            </ul>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/bootstrap-ck.js"></script>
</body>
</html>
