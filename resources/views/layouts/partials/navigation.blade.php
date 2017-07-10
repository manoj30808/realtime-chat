<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li class="waves-effect {{ ((Request::segment(1)=='home') ? 'active' : '') }}">
                <a href="/home"> <i class="mdi mdi-home" data-icon="v"></i><span class="hide-menu"> Home</span></a>
            </li>
            @permission('manage-users')
                <li class="waves-effect {{ ((Request::segment(1)=='user') ? 'active' : '') }}">
                    <a href="/user"> <i class="mdi mdi-account" data-icon="v"></i><span class="hide-menu"> User</span></a>
                </li>                
            @endpermission
            @permission('manage-roles')
                <li class="waves-effect {{ ((Request::segment(1)=='role') ? 'active' : '') }}">
                    <a href="/role"> <i class="mdi mdi-school" data-icon="v"></i><span class="hide-menu"> Role</span></a>
                </li>                
            @endpermission
            @permission('manage-permission')
                <li class="waves-effect {{ ((Request::segment(1)=='permission') ? 'active' : '') }}">
                    <a href="/permission"> <i class="mdi mdi-rename-box" data-icon="v"></i><span class="hide-menu"> Permission</span></a>
                </li>                
            @endpermission
            @permission('manage-setting')
                <li class="waves-effect {{ ((Request::segment(1)=='setting') ? 'active' : '') }}">
                    <a href="/setting"> <i class="mdi mdi-settings" data-icon="v"></i><span class="hide-menu"> Setting</span></a>
                </li>                
            @endpermission
            @permission('manage-logs')
                <li class="waves-effect {{ ((Request::segment(1)=='logs') ? 'active' : '') }}">
                    <a href="/logs"> <i class="mdi mdi-pencil" data-icon="v"></i><span class="hide-menu">Activity Log</span></a>
                </li>                
            @endpermission
            <li class="waves-effect {{ ((Request::segment(1)=='chat') ? 'active' : '') }}">
                <a href="/chat"> <i class="mdi mdi-gmail" data-icon="v"></i><span class="hide-menu">Chat</span></a>
            </li>      
        </ul>
    </div>
</div>