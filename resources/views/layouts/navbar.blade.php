<?php
/**
 * Created by PhpStorm.
 * User: Melih
 * Date: 21.11.2016
 * Time: 18:15
 */
?>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url ('') }}">Görev Yönetimi</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    @if(Auth::check())
                        <li><a href="#">{{ Request::user()->name }}</a></li>
                        <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    @else
                        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Login</a></li>
                    @endif
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->


        <!-- /.navbar-static-side -->
    </nav>