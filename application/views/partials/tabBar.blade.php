<? if(Auth::check()){ ?>
<div id="tabBar">
    <ul>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->controller == 'projects'){echo 'class="active"';}?>><a href="{{URL::to_route('projects')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'projects'){echo 'active';}?>" id="projectTabBarIcon"></div>Projects</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->controller == 'clients'){echo 'class="active"';}?>><a href="{{URL::to_route('clients')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'clients'){echo 'active';}?>" id="clientsTabBarIcon"></div>Clients</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->controller == 'timesheets'){echo 'class="active"';}?>><a href="{{URL::to_route('timesheets')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'timesheets'){echo 'active';}?>" id="timesheetsTabBarIcon"></div>&nbsp;Time&nbsp;</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li <?if(Request::route()->controller == 'invoices'){echo 'class="active"';}?>><a href="{{URL::to_route('invoices')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'invoices'){echo 'active';}?>" id="invoiceTabBarIcon"></div>Billing</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=100){ ?><li <?if(Request::route()->controller == 'users'){echo 'class="active"';}?>><a href="{{URL::to_route('users')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'users'){echo 'active';}?>" id="usersTabBarIcon"></div>Users</a></li><? }?>
        <? if(Auth::check() && Auth::User()->access_lvl >=50){ ?><li <?if(Request::route()->controller == 'passwords'){echo 'class="active"';}?>><a href="{{URL::to_route('passwords')}}"><div class="tabBarIcon <?if(Request::route()->controller == 'passwords'){echo 'active';}?>" id="passwordsTabBarIcon"></div>Passwords</a></li><? }?>
    </ul>
</div>
    <? } ?>