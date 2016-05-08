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
                    <h1 class="title">Edit Profile</h1>
                    <p class="description">User profile and site setting</p>
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
                            <strong>Edit Profile</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <section class="profile-env">
                <div class="row">
                    <div class="col-sm-3">
                        <!-- User Info Sidebar -->
                        <div class="user-info-sidebar">
                            <a href="#" class="user-img">
                                <img class="img-cirlce img-responsive img-thumbnail" src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=72&amp;r=G&amp;d=mm" alt="{{ Auth::user()->name }}" width="72" height="72">
                            </a>
                            <a href="#" class="user-name">
                                {{ $user->name }}
                                <span class="user-status is-online"></span>
                            </a>
							<span class="user-title">
								<strong>{{ $options->description }}</strong>
							</span>
                            <hr>
                            <ul class="list-unstyled user-info-list">
                                <li>
                                    <i class="linecons-mail"></i>
                                    <span>{{ $user->email }}</span>
                                </li>
                                <li>
                                    <i class="fa-graduation-cap"></i>
                                    University of Bologna
                                </li>
                            </ul>
                            <hr>
                            <ul class="list-unstyled user-friends-count">
                                <li>
                                    @if(!empty($articles))
                                        <span>{{ count($articles) }}</span>
                                    @else
                                        <span>0</span>
                                    @endif
                                    篇文章
                                </li>
                                <li>
                                    @if(!empty($comments))
                                        <span>{{ count($comments) }}</span>
                                    @else
                                        <span>0</span>
                                    @endif
                                    条评论
                                </li>
                            </ul>
                            <a href="/admin/options/basic" class="btn btn-success btn-block">
                                更改站点信息
                            </a>
                        </div>

                    </div>

                    <div class="col-sm-9">
                        <!-- User timeline stories -->
                        <section class="user-timeline-stories profile-post-form">
                            {!! Form::model($user,['url'=>'/admin/user/edit/'.$user->id,'method'=>'PATCH']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', '用户名') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', '密码') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', '确认密码') !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', '电子邮件') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('提交修改',['class'=>'btn btn-primary form-control']) !!}
                            {!! Form::close() !!}
                        </section>
                    </div>
                </div>
            </section>
            @if ( Session::has('success') )
                <script>
                    window.onload = function () {
                        toastr.success("{{ Session::get('success') }}", "成功提示!", opts);
                    };
                </script>
            @endif
            @if ( Session::has('errors') )
                <script>
                    window.onload = function () {
                        toastr.error("{{ Session::get('errors') }}", "失败提示!", opts);
                    };
                </script>
            @endif
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