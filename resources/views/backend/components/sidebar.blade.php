<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="{{ Request::is('admin') ? 'active' : '' }}"> 
                    <a href="{{ url('/admin') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('member') || Request::is('member/create') ? 'active' : '' }}"><i class="fe fe-layout"></i> <span> Mess Member </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('member.index') }}" class="{{ Request::is('member') ? 'link-active' : '' }}">All Member </a></li>
                        <li><a href="{{ route('member.create') }}" class="{{ Request::is('member/create') ? 'link-active' : '' }}">Add New Member</a></li>
                    </ul>
                </li>         
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->