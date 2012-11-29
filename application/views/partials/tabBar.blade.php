<? if(Auth::check()){ ?>
<div id="tabBar">
    <ul>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li><a href="{{URL::to_route('projects')}}"><div class="tabBarIcon" id="projectTabBarIcon"></div>Projects</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li><a href="{{URL::to_route('clients')}}"><div class="tabBarIcon" id="clientsTabBarIcon"></div>Clients</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li><a href="{{URL::to_route('timesheets')}}"><div class="tabBarIcon" id="timesheetsTabBarIcon"></div>&nbsp;Time&nbsp;</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li><a href="{{URL::to_route('invoices')}}"><div class="tabBarIcon" id="invoiceTabBarIcon"></div>Billing</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li><a href="{{URL::to_route('users')}}"><div class="tabBarIcon" id="usersTabBarIcon"></div>Users</a></li><? }?>
    </ul>
</div>
    <? } ?>