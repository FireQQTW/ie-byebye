<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?=Config::get('app.site');?></title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('admin._partials.adminCss')
    @yield('asset-css')
</head>

<body>
    <div class="navbar navbar-default" id="navbar">

        <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <i class="icon-leaf"></i>
                        {{Config::get('app.site')}}
                    </small>
                </a>
                <!-- /.brand -->
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="/admin/avatars/user.png" alt="{{Auth::user()->name}}" />
                            <span class="user-info">
                                <small>Welcome,</small>
                                {{Auth::user()->name}}
                            </span>

                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="{{ URL::route('logout') }}">
                                    <i class="icon-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </div>

    <div class="main-container" id="main-container">

        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="icon-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="icon-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="icon-group"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="icon-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div>
                <!-- #sidebar-shortcuts -->
                <input type="hidden" id="menu_active" value="{{$menu_active}}" />
                <ul id="mainmenu" class="nav nav-list">
                    <li>
                        <a href="{{URL::route('admin.index')}}"> 
                            <i class="icon-dashboard"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-unlock-alt"></i>
                            <span class="menu-text">安全性設定</span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                 <a href="{{URL::route('admin.users.index')}}">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text">管理者管理</span>
                                </a>
                            </li>
                            <li>
                                 <a href="{{URL::route('admin.roles.index')}}">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text">群組管理</span>
                                </a>
                            </li>
                            <li>
                                 <a href="{{URL::route('admin.permissions.index')}}">
                                    <i class="icon-double-angle-right"></i>
                                    <span class="menu-text">權限管理</span>
                                </a>
                            </li>
                        </ul>
                        <li>
                             <a href="{{URL::route('admin.landlords.index')}}">
                                <i class="icon-home"></i>
                                <span class="menu-text">房東管理</span>
                            </a>
                        </li>
                    </li>
                </ul>
                <!-- /.nav-list -->

                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                </div>
            </div>

            <div class="main-content">
                @yield('breadcrumbs')

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            {{$h1}}
                            <small>
                                <i class="icon-double-angle-right"></i>
                                {{$h1Small}}
                            </small>
                        </h1>
                    </div>
                    <!-- /.page-header -->
                    <div class="row">
                        <div class="col-xs-12">
                            @yield('main')
                        </div>
                    </div>

                </div>
                <!-- /.page-content -->
            </div>
            <!-- /.main-content -->

            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="icon-cog bigger-150"></i>
                </div>

                <div class="ace-settings-box" id="ace-settings-box">
                    <div>
                        <div class="pull-left">
                            <select id="skin-colorpicker" class="hide">
                                <option data-skin="default" value="#438EB9">#438EB9</option>
                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                            </select>
                        </div>
                        <span>&nbsp; Choose Skin</span>
                    </div>

                    <div>
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                        <label class="lbl" for="ace-settings-navbar">Fixed Navbar</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                        <label class="lbl" for="ace-settings-sidebar">Fixed Sidebar</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                        <label class="lbl" for="ace-settings-breadcrumbs">Fixed Breadcrumbs</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                        <label class="lbl" for="ace-settings-rtl">Right To Left (rtl)</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                        <label class="lbl" for="ace-settings-add-container">
                            Inside
                            <b>.container</b>
                        </label>
                    </div>
                </div>
            </div>
            <!-- /#ace-settings-container -->
        </div>
        <!-- /.main-container-inner -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
    </div>
    <!-- /.main-container -->
    <!-- load requirejs -->
    {{HTML::script('/components/requirejs/require.js', array('data-main' => '/admin/js/config/require.settings'))}}
    @yield('asset-js')
</body>

</html>
