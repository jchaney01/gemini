<? if(Auth::check()){ ?>
<div id="tabBar">
    <ul>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->is('projects')){echo 'class="active"';}?>><a href="{{URL::to_route('projects')}}"><div class="tabBarIcon <?if(Request::route()->is('projects')){echo 'active';}?>" id="projectTabBarIcon"></div>Projects</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->is('clients')){echo 'class="active"';}?>><a href="{{URL::to_route('clients')}}"><div class="tabBarIcon <?if(Request::route()->is('clients')){echo 'active';}?>" id="clientsTabBarIcon"></div>Clients</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->is('timesheets')){echo 'class="active"';}?>><a href="{{URL::to_route('timesheets')}}"><div class="tabBarIcon <?if(Request::route()->is('timesheets')){echo 'active';}?>" id="timesheetsTabBarIcon"></div>&nbsp;Time&nbsp;</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li <?if(Request::route()->is('invoices')){echo 'class="active"';}?>><a href="{{URL::to_route('invoices')}}"><div class="tabBarIcon <?if(Request::route()->is('invoices')){echo 'active';}?>" id="invoiceTabBarIcon"></div>Billing</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li <?if(Request::route()->is('users')){echo 'class="active"';}?>><a href="{{URL::to_route('users')}}"><div class="tabBarIcon <?if(Request::route()->is('users')){echo 'active';}?>" id="usersTabBarIcon"></div>Users</a></li><? }?>
    </ul>
</div>
    <? } ?>