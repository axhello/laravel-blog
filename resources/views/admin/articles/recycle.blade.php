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
                    <h1 class="title">Recycle Bin</h1>
                    <p class="description">Dynamic table variants with pagination and other controls</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="/admin/articles">Articles</a>
                        </li>
                        <li class="active">
                            <strong>Recycle</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Responsive Table -->
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">回收站文章</h3>
                            <div class="panel-options">
                                <a href="#" data-toggle="panel">
                                    <span class="collapse-icon">–</span>
                                    <span class="expand-icon">+</span>
                                </a>
                                <a href="#" data-toggle="remove">
                                    ×
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-wrapper">
                                <div class="table-responsive">
                                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th id="idcbc9bb11ff70e-col-0">标题</th>
                                            <th data-priority="1">作者</th>
                                            <th data-priority="3">删除于</th>
                                            <th data-priority="1">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($articles as $article)
                                            <tr>
                                                <th colspan="1" data-columns="idcbc9bb11ff70e-col-0"><span>{{ $article->title }}</span></th>
                                                <td data-priority="1" colspan="1">{{ $article->user->name }}</td>
                                                <td data-priority="3" colspan="1">{{ $article->deleted_at }}</td>
                                                <td data-priority="1" colspan="1">
                                                    <a href="/admin/articles/restore/{{ $article->id }}" class="btn btn-secondary btn-sm btn-icon">恢复文章</a>
                                                    <a id="delete" href="/admin/articles/delete/{{ $article->id }}" class="btn btn-danger btn-sm btn-icon">彻底删除</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.notice')
            <script>
               $('#delete').click(function(e) {
                   e.preventDefault();
                   swal({
                       title: "确定删除文章?",
                       text: "删除后你将无法恢复这个文章!",
                       type: "warning",
                       showCancelButton: true,
                       confirmButtonColor: "#DD6B55",
                       confirmButtonText: "Yes, delete it!",
                       cancelButtonText: "No, cancel!",
                       closeOnConfirm: false },
                       function(){
                           location.href = $('#delete').attr('href');
                       });
               })
            </script>
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