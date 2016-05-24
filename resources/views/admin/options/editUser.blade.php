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
                                <img class="img-cirlce img-responsive img-thumbnail" src="http://gravatar.duoshuo.com/avatar/{{ md5(Auth::user()->email) }}?s=72&amp;r=G&amp;d=mm" alt="{{ Auth::user()->name }}" width="72" height="72">
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
                                    <span>0</span>
                                    篇文章
                                </li>
                                <li>
                                    <span>0</span>
                                    条评论
                                </li>
                            </ul>
                            <a href="/admin/options/basic" class="btn btn-success btn-block">
                                更改站点信息
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <section class="user-timeline-stories profile-post-form">
                            {!! Form::model($user,['url'=>'/admin/user/update/'.$user->id, 'method'=>'PATCH']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', '用户名') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', '电子邮件') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('old_password', '修改密码') !!}
                                    {!! Form::password('old_password', ['class' => 'form-control', 'placeholder'=>'当前密码']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('new_password', '确认密码') !!}
                                    {!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=>'新密码']) !!}
                                </div>
                                {!! Form::submit('保存修改',['class'=>'btn btn-primary form-control']) !!}
                            {!! Form::close() !!}
                        </section>
                    </div>
                </div>
            </section>
            @include('admin.notice')
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