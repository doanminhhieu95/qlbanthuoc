<header class="main-header">
<?php
$uri = $_SERVER['REQUEST_URI'];
$url = url()->current();
$link = explode("/",$url);
$idmenu = explode("&",$uri);
?>
    <!-- Logo -->
    <a href="/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            @if(Auth::check())
                <p>{{Auth::user()->name}}</p>
                @endif
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out text-danger"></i> Log out</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Danh mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($danhmuc as $dm)
                    <li class=>
                        <a href="/danhmucthuoc/{{$dm->id}}">
                            <i class="fa fa-circle-o"></i>{{$dm->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="">
                <a href="" >
                    <i class="fa fa-th"></i>
                    <span>Answer</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">3</small>
                    </span>
                </a>
            </li>
            <li class="header">LABELS</li>
            <li>
                <a href="{{route('user.index')}}">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Admin</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>Information</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>