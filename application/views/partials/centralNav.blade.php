@if(Section::yield('centralNav'))
<div id="centralNav">
    <div class="row-fluid hidden-phone">
        @section("centralNav")
        <div class="span4"><a id="overview" href="http://apple.com1" class="active">Overview</a></div>
        <div class="span4"><a id="timelogs" href="http://apple.com1" class="">Time</a></div>
        <div class="span4"><a id="changeorders" href="http://apple.com1" class="">Change Orders</a></div>
        @yield_section
    </div>
    <div class="row-fluid hidden-phone">
        <div class="navLine">
            <div id="positionIndicator"></div>
        </div>
    </div>
</div>
@endif