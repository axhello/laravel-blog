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
                                <li>
                                    <a href="#">Manages</a>
                                </li>
                                <li class="active">
                                    <strong>Comment</strong>
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
                    {!! Form::open(['url'=>'/admin/comment','method'=>'DELETE']) !!}
                    <table class="table table-bordered table-striped" id="example-2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkbox"></th>
                            <th>作者</th>
                            <th></th>
                            <th>内容</th>
                        </tr>
                        </thead>
                        <tbody class="middle-align">
                        @foreach($comments as $comment)
                            <tr role="row" class="odd">
                                <td><input type="checkbox" name="id[]" id="checkbox" value="{{ $comment->id }}"></td>
                                <td>
                                    <div class="comment-avatar">
                                        <img class="avatar" src="https://secure.gravatar.com/avatar/{{ md5($comment->email) }}?s=42&amp;r=G&amp;d=mm" alt="{{ $comment->username }}" width="42" height="42">
                                    </div>
                                </td>
                                <td>
                                    <div class="comment-meta">
                                        <strong>
                                            <a href="#" rel="external nofollow" target="_blank">{{ $comment->username }}</a>
                                        </strong>
                                        <br>
                                        <span>{{ $comment->email }}</span>
                                        <br>
                                        <span>{{ $comment->ip }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="comment-body">
                                        <div class="comment-date">
                                            {{ $comment->created_at->diffForHumans() }} 于 <a href="#">{{ $comment->articles->title }}</a>
                                        </div>
                                        <div class="comment-content">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-6">
                            <input href="#" type="submit" class="btn btn-danger btn-md btn-icon icon-left" value="Delete">
                        </div>
                        <div class="col-xs-6">
                            <div class="pull-right">
                                {!! $comments->links() !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                toastr.success("{{ Session::get('success') }}", "成功提醒( •̀∀•́ )✧", opts);
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