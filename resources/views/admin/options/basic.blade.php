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
                    <h1 class="title">Site Settings</h1>
                    <p class="description">User profile and site setting</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li class="active">
                            <strong>Options</strong>
                        </li>
                        <li class="active">
                            <strong>Basic</strong>
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
                                {{ Auth::user()->name }}
                                <span class="user-status is-online"></span>
                            </a>
							<span class="user-title">
								<strong>{{ $options->description }}</strong>
							</span>
                            <hr>
                            <ul class="list-unstyled user-info-list">
                                <li>
                                    <i class="linecons-mail"></i>
                                    <span>{{ Auth::user()->email }}</span>
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
                            <a href="/admin/user/edit" class="btn btn-success btn-block">
                                修改资料
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <!-- User timeline stories -->
                        <section class="user-timeline-stories profile-post-form">
                            @if(empty($options))
                                {!! Form::open(['url'=>'admin/options/basic']) !!}
                            @else
                                {!! Form::model($options,['url'=>'admin/options/basic/'.$options->id,'method'=>'PATCH']) !!}
                            @endif
                                {!! Form::hidden('author', Auth::user()->name ) !!}
                                <div class="form-group">
                                    {!! Form::label('title', '站点名称') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    <p style="margin: 8px 0;">站点的名称将显示在网页的标题处</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('siteUrl', '站点地址') !!}
                                    {!! Form::text('siteUrl', null, ['class' => 'form-control']) !!}
                                    <p style="margin: 8px 0;">站点地址主要用于生成内容的永久链接</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', '站点描述') !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                    <p style="margin: 8px 0;">站点描述将显示在网页代码的头部</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('keywords', '关键词') !!}
                                    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
                                    <p style="margin: 8px 0;">请以半角逗号","分割多个关键词</p>
                                </div>
                        </section>
                        <section class="user-timeline-stories">
                            <article class="timeline-story">
                                <div style="font-size: 32px;margin-bottom: 10px;text-align: center">Social Link</div>
                                    <div class="form-group">
                                        {!! Form::label('twitter', 'Twitter链接:') !!}
                                        {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('weibo', 'Weibo链接:') !!}
                                        {!! Form::text('weibo', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('steam', 'Steam链接:') !!}
                                        {!! Form::text('steam', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('github', 'Github链接:') !!}
                                        {!! Form::text('github', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email地址:') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('提交修改',['class'=>'btn btn-primary form-control']) !!}
                            </article>
                        </section>
                        {!! Form::close() !!}
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