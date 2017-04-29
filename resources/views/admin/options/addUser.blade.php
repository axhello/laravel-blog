@extends('admin.layout')
@section('content')

    @include('admin.header')
    <div class="page-container">

        @include('admin.sidebar')

        <div class="main-content">
            <!-- User Info, Notifications and Menu Bar -->
            @include('admin.navbar')

            <div class="page-title">
                <div class="title-env">
                    <h1 class="title">Add user</h1>
                    <p class="description">Add administrator</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li class="active">
                            <a href="/admin/options/basic">Options</a>
                        </li>
                        <li class="active">
                            <strong>Add user</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加一个用户</h3>
                        </div>
                        <div class="panel-body">

                            <form role="form" class="form-horizontal">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-1">用户名</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="field-1" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group-separator"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-2">密码</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="field-2" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group-separator"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-3">电子邮箱</label>

                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="field-3" placeholder="Enter your email…">
                                    </div>
                                </div>

                                <div class="form-group-separator"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-md-offset-4">
                                        <input type="submit" class="btn btn-info btn-block" id="field-3" value="添加用户">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; 2014
                        <strong>Xenon</strong>
                        More Templates
                    </div>
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@stop