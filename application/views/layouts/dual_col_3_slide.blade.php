<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{$title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    @include("partials.css")
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->
@include("partials.tabBar")
<div class="container-fluid">
    <div class="row-fluid" id="header">
        <div id="logo" class="span6">
            @include('partials.logo')
        </div>
        <div id="topRightView" class="span6">
            @yield('top_right')
        </div>
    </div>
    <? if (!Request::route()->is('login')) {?>@include('partials.centralNav')<?}?>

    <div class="row-fluid">
        <div id='slider'>
            <ul>
                <li style='display:block' id="projectOverview" class="page1">
                    <div class="span7">
                        @yield('content_slide_1_left')
                    </div>
                    <div class="span5">
                        @yield('content_slide_1_right')
                    </div>
                </li>
                <li style='display:none'>
                    <div class="span7">
                        @yield('content_slide_2_left')
                    </div>
                    <div class="span5">
                        @yield('content_slide_2_right')
                    </div>
                </li>
                <li style='display:none'>
                    <div class="span7">
                        @yield('content_slide_3_left')
                    </div>
                    <div class="span5">
                        @yield('content_slide_3_right')
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/bootstrap-ck.js"></script>
@yield('scripts')
</body>
</html>