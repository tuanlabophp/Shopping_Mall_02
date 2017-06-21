<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('bower/AdminLTE/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}
    {{ Html::style('bower/AdminLTE/dist/css/AdminLTE.min.css') }}
    {{ Html::style('bower/AdminLTE/dist/css/skins/_all-skins.min.css') }}
    {{ Html::style('css/admin.css') }}

    @yield('style')

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="#" class="logo">
                <span class="logo-lg">{{ trans('view.admin') }}</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            
                            <ul class="dropdown-menu">
                                <li class="header">{{ trans('view.you_have') }} 4 {{trans('view.message')}}</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>{{ trans('view.support') }}<small><i class="fa fa-clock-o"></i> 5 {{ trans('view.min') }}</small></h4>
                                                <p></p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                </li>
                              <li class="footer"><a href="#">{{ trans('view.see_all_message') }}</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="{{ asset('images/'.Auth::user()->avatar) }}" class="user-image" alt="User Image">
                              <span class="hidden-xs">{{ Auth::user()->l_name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('images/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                                    <p>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">{{ trans('view.profile') }}</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat">{{ trans('view.logout') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->l_name }}</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">{{ trans('view.main_navigation') }}</li>
                    <li class="treeview">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="fa fa-codiepie"></i> <span>{{ trans('view.category') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.product.index') }}">
                            <i class="fa fa-product-hunt"></i>
                            <span>{{ trans('view.product') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.order.index') }}">
                            <i class="fa fa-opera"></i> <span>{{ trans('view.order') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.user.index') }}">
                            <i class="fa fa-user-secret"></i> <span>{{ trans('view.user') }}</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        
            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>{{ trans('view.version') }}</b> {{ trans('view.version_number') }}
            </div>
            <strong>{{ trans('view.copyright') }} &copy; {{ trans('view.year') }} <a href="{{ route('/') }}">{{ trans('view.app_name') }}</a>.</strong> {{ trans('view.all_rights_reserved') }}
        </footer>
    </div>
    {{ Html::script('bower/jquery/dist/jquery.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('bower/AdminLTE/dist/js/app.min.js') }}
    {{ Html::script('js/admin.js') }}

    @yield('scrip')

</body>
</html>
