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
                    <h1 class="title">Articles</h1>
                    <p class="description">Dynamic table variants with pagination and other controls</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li class="active">
                            <strong>Pages</strong>
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
                            <th><input id="cbox" class="cbox" type="checkbox"></th>
                            <th>标题</th>
                            <th>更新于</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="middle-align">
                        @foreach($pages as $page)
                            <tr>
                                <td><input name="aid[]" type="checkbox" value="{{ $page->id }}"></td>
                                <td><a href="/admin/pages/{{$page->id}}/edit">{{ $page->title }}</a></td>
                                <td>{{ $page->updated_at }}</td>
                                <td>
                                    {!! Form::open(['url'=>'/admin/pages/'.$page->id,'method'=>'DELETE','id'=>'delete-form']) !!}
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm btn-icon icon-left">
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_info">
                                <a  href="/admin/pages/create" class="btn btn-info btn-md btn-icon icon-left">
                                    创建页面
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers" style="text-align: right;">
                                {!! $pages->links() !!}
                            </div>
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
    @if ( Session::has('success') )
        <script>
            window.onload = function () {
                toastr.success("{{ Session::get('success') }}", "成功提醒!", opts);
            };
        </script>
    @endif
    @if ( Session::has('errors') )
        <script>
            window.onload = function () {
                toastr.success("{{ Session::get('errors') }}", "失败提示!", opts);
            };
        </script>
    @endif
    @if ( Session::has('info') )
        <script>
            window.onload = function () {
                toastr.info('{{ Session::get('info') }}');
            };
        </script>
    @endif

@stop