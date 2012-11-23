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
    <meta name="viewport" content="width=550, initial-scale=1, user-scalable=no">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-responsive.min.css') }}
    {{ HTML::style('css/screen.css') }}
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

    <nav>
        <ul>
            <li class="active"><a href="#"><? echo HTML::image('img/navProjectsActive.png', "Projects Icon");?>Projects</a></li><li><a href="#"><? echo HTML::image('img/navInvoices.png', "Projects Icon");?>Invoices</a></li>
        </ul>
    </nav>

<div class="container-fluid">
    <div class="row-fluid" id="header">
        <div id="logo" class="span6">
            <div class="clientName">Client Name</div>
            <div id="dashboardHeader">dashboard</div>
        </div>
        <div id="projectListView span6">
            <div id="projectList">
                <select class="visible-phone" name="projects" id="">
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                    <option value="Project Nam dfg fg fdgdg fe">fdg dfggdfg df gdfgd fg</option>
                </select>
                <ul class="hidden-phone">
                    <li><a href="#">Project Nam dfg fg fdgdg fe</a></li>
                    <li><a href="#">Project Nam dfg fg fdgdg fe</a></li>
                    <li><a href="#">Project Nam dfg fg fdgdg fe</a></li>

                </ul>
            </div>
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
                <div class="positionIndicator"></div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div id='slider'>
            <ul>
                <li style='display:block' id="projectOverview" class="page1">
                    <div class="span6">
                        <h1>Project Name</h1>

                        <h2>PO or Ext. Project ID</h2>

                        <div class="overviewModule">
                            <a href="#">
                                <div>Issue Tracking</div>
                            </a>

                            <p>This project is currently being tracked.<br>
                                Click the link to go to the tracker
                            </p>
                        </div>
                        <div class="overviewModule">
                            <a href="#">
                                <div>Code Repository</div>
                            </a>

                            <p>This project is currently under version control.<br>
                                The repo name is BLAH
                            </p>
                        </div>
                    </div>
                    <div class="span6">BUDGET CHART</div>
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
<script src="js/main.js"></script>
</body>
</html>
