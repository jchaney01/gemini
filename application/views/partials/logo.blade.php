<div class="clientName">Creative Acceleration</div>
<div <? if(Auth::check()){ ?>rel="popover" data-original-title="Logged in as" data-content="{{Auth::user()->first_name}} {{Auth::user()->last_name }}" data-trigger="hover" data-placement="bottom"<? } ?> id="dashboardHeader">gemini
    <? if(Auth::check()){ ?>
        <a  data-placement="bottom" style="padding: 2px 8px 5px 8px;font-size: 10px;" class="btn btn-inverse" href="{{URL::to_route('logout')}}">Logout</a>
    <? } ?>
</div>