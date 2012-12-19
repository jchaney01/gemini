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
       <?php echo 1; ?>
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

    <nav>
        <ul>
            <li class="active"><a href="#"><? echo HTML::image('img/navProjectsActive.png', "Projects Icon");?>Projects</a></li><li><a href="#"><? echo HTML::image('img/navInvoices.png', "Invoices Icon");?>Invoices</a></li>
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
                        <div class="timeEntry">
                            <div class="time">1<span>h</span> 34<span>m</span></div>
                                <div>
                                    5/18/2012
                                </div>
                                <div>
                                    Worked on foo bar
                                </div>
                                <div>
                                    <a href="#">Dave West</a>
                                </div>
                        </div>
                        <div class="timeEntry">
                            <div class="time">1<span>h</span> 34<span>m</span></div>
                            <div>
                                5/18/2012
                            </div>
                            <div>
                                Worked on foo bar
                            </div>
                            <div>
                                <a href="#">Dave West</a>
                            </div>
                        </div>
                        <div class="COEntry">
                            <div class="time">5 <span>hours</span> <span class="status approved">Approved</span></div>
                            <div>
                                Approved by <a href="#">Adam Young</a> on 5/18/2012
                            </div>
                            <div>
                                Worked on foo bar
                            </div>
                        </div>
                        <div class="COEntry">
                            <div class="time">5 <span>hours</span> <span class="status denied">Approved</span></div>
                            <div>
                                Approved by <a href="#">Adam Young</a> on 5/18/2012
                            </div>
                            <div>
                                Worked on foo bar
                            </div>
                        </div>
                        <div class="COEntry">
                            <div class="time">5 <span>hours</span> <span class="status pending">Approved</span></div>
                            <div>
                                Approved by <a href="#">Adam Young</a> on 5/18/2012
                            </div>
                            <div>
                                Worked on foo bar
                            </div>
                        </div>
                        <div class="invoiceEntry">
                            <div class="time">#6421 <span class="status due">Due</span></div>
                            <div>
                                $9,987.50
                            </div>
                            <div>
                                Desc sent on 8/2/5211
                            </div>
                            <div><a href="#">Pay Now</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">View</a></div>
                        </div>
                    </div>
                    <div class="span5">
                        <div class="timeEntry">
                            <div>Time Since last project invoice</div>
                            <div class="time">1<span>h</span> 34<span>m</span></div>
                        </div>
                        <div class="timeEntry">
                            <div>Time Since last project invoice</div>
                            <div class="time">1<span>h</span> 34<span>m</span></div>
                        </div>
                        <div class="timeEntry">
                            <div>Total Approved</div>
                            <div class="time">7.35<span>h</span></div>
                        </div>
                        <div class="invoiceSummary">
                            Currently Due
                            <div class="time"><span style="vertical-align: super;">$</span>1,876</div>
                            <a href="#"> View Past Invoices</a>
                        </div>
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
