<div class="clientName">Creative Acceleration</div>
<div id="dashboardHeader">gemini
    <? if(Auth::check()){ ?>
        <a  data-placement="bottom" style="padding: 2px 8px 5px 8px;font-size: 10px;" class="btn btn-inverse" href="{{URL::to_route('logout')}}">Logout</a>
    <? } ?>
</div>