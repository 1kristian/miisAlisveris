<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>miisAlisveris Administrator</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('adminassets')}}/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ url('adminassets')}}/plugins/datatables/dataTables.bootstrap.css">
        <!-- jQuery Colorbox -->
        <link href="{{ url('adminassets') }}/plugins/colorbox/colorbox.css" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('adminassets')}}/dist/css/bootstrap-multiselect.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('adminassets')}}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="{{ url('adminassets')}}/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="{{ url('admin/home') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>mi</b>iS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>miiS</b>Alisveris</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <i class="fa fa-user" aria-hidden="true" style="font-size: 13px;"></i>
                                    <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <i class="fa fa-user" aria-hidden="true" style="font-size: 66px;  color:#fff;"></i>
                                        <!-- <img src="dist/img/default-160x160.jpg" class="img-circle" alt="User Image"> -->
                                        <p>
                                            {{ Auth::user()->email }}
                                            <small>{{ trans('admin/template/header.created_at') }}{{ Auth::user()->created_at }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('profile') }}" class="btn btn-default btn-flat">{{ trans('admin/template/header.profile') }}</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('logout') }}" class="btn btn-warning btn-flat">{{ trans('admin/template/header.logout') }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <i class="fa fa-user" aria-hidden="true" style="font-size: 13px; color:#fff;"></i>
                            <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}</p>
                            <!-- Status -->
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="{{ trans('admin/template/header.search') }}">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">{{ trans('admin/template/header.navigation_header') }}</li>
                        <li {{ Request::is('admin/home') ? ' class=active' : null }}><a href="{!! url('admin/home') !!}"><i class="fa fa-dashboard"></i> <span>{{ trans('admin/template/header.home') }}</span></a></li>
                        <li {{ Request::is('admin/category') ? ' class=active' : null }}><a href="{!! url('admin/category') !!}"><i class="fa fa-list-alt"></i> <span>{{ trans('admin/template/header.category') }}</span></a></li>
                        <li {{ Request::is('admin/product') ? ' class=active' : null }}><a href="{!! url('admin/product') !!}"><i class="fa fa-cube"></i> <span>{{ trans('admin/template/header.product') }}</span></a></li>
                        <li {{ Request::is('admin/order') ? ' class=active' : null }}><a href="{!! url('admin/order') !!}"><i class="fa fa-turkish-lira"></i> <span>{{ trans('admin/template/header.order') }}</span></a></li>
                        <li {{ Request::is('admin/user') ? ' class=active' : null }}><a href="{!! url('admin/user') !!}"><i class="fa fa-users"></i> <span>{{ trans('admin/template/header.user') }}</span></a></li>
                        <li {{ Request::is('admin/currency') ? ' class=active' : null }}><a href="{!! url('admin/currency') !!}"><i class="fa fa-money"></i> <span>{{ trans('admin/template/header.currency') }}</span></a></li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
