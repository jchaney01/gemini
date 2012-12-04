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
        <div id="topRightView" class="span5">
            @section('top_right')
            <div id="projectList">
                <ul>
                    @foreach ($projects as $project)
                    <li><a href="{{URL::to_route('projects')}}/{{$project->id}}">{{$project->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            @yield_section
        </div>
        <div class="span1" id="projectStatuses">
            <div class="btn-group btn-group-vertical hidden-phone" data-toggle="buttons-radio" style="margin-left: 20px">
                <button type="button" class="btn active btn-inverse"><a href="#"><i class="icon-white icon-fire"></i></a></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-star-empty"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-warning-sign"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-ok"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-search"></i></button>
            </div>
            <div class="btn-group btn-group visible-phone" data-toggle="buttons-radio">
                <button type="button" class="btn active btn-inverse"><a href="#"><i class="icon-white icon-fire"></i></a></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-star-empty"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-warning-sign"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-ok"></i></button>
                <button type="button" class="btn btn-inverse"><i class="icon-white icon-search"></i></button>
            </div>
        </div>
    </div>

    @include('partials.centralNav')

    <div class="row-fluid">
        <div class="span12">
            @yield('content')
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