@extends('admin.home')
@section('content')
    @include('admin.header')
    <div class="page-container">

        @include('admin.sidebar')

        <div class="main-content">
            <!-- User Info, Notifications and Menu Bar -->
            @include('admin.navbar')

            <div class="page-title">
                <div class="title-env">
                    <h1 class="title">DataTable</h1>
                    <p class="description">Dynamic table variants with pagination and other controls</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="#">Manages</a>
                        </li>
                        <li class="active">
                            <strong>Tags</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Removing search and results count filter -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Removing search and results count filter</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped" id="example-2">
                        <thead>
                        <tr>
                            <th>分类</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="middle-align">
                        @foreach($tags as $tag)
                            <tr role="row" class="odd">
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm btn-icon icon-left">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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