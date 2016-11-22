@extends('layouts.plane')

@section('body')
    @if(@!$welcome)
    <div id="wrapper">
        <!-- Navigation -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li {{ ((Request::is('/') or Request::is('*/tasks/*')) ? 'class="active"' : '') }}>
                        <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Görevler</a>
                    </li>
                    <li {{ (Request::is('*/users/*') ? 'class="active"' : '') }}>
                        <a href="{{ url ('admin/users') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Kullanıcı</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li {{ (Request::is('*/roles/*') ? 'class="active"' : '') }}>
                        <a href="{{ url ('admin/roles') }}"><i class="fa fa-table fa-fw"></i> Gruplar</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
    @endif
            <div class="row">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

