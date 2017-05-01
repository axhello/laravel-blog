@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <legend><h4 class="title">基本设置</h4></legend>
                    </div>
                    <div class="content">
                        @if(empty($options))
                            {!! Form::open(['url'=>'admin/options/basic']) !!}
                        @else
                            {!! Form::model($options,['url'=>'admin/options/basic/'.$options->id,'method'=>'PATCH']) !!}
                        @endif
                            {!! Form::hidden('author', Auth::user()->name ) !!}
                            <div class="form-group">
                                {!! Form::label('title', '站点名称') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                <p class="tips"><span class="text-red">*</span>站点名称将显示在网页的标题处</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('siteUrl', '站点地址') !!}
                                {!! Form::text('siteUrl', null, ['class' => 'form-control']) !!}
                                <p class="tips"><span class="text-red">*</span>站点地址主要用于生成内容的永久链接</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('keywords', '关键词') !!}
                                {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
                                <p class="tips"><span class="text-red">*</span>请以半角逗号","分割多个关键词</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', '站点描述') !!}
                                {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                <p class="tips"><span class="text-red">*</span>站点描述将显示在网页代码的头部</p>
                            </div>
                            <legend>社交链接</legend>
                            <div class="form-group">
                                {!! Form::label('twitter', 'Twitter链接:') !!}
                                {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('weibo', 'Weibo链接') !!}
                                {!! Form::text('weibo', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('steam', 'Steam链接') !!}
                                {!! Form::text('steam', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('github', 'Github链接') !!}
                                {!! Form::text('github', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email地址') !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="text-right">
                                {!! Form::submit('提交修改',['class'=>'btn btn-info btn-fill']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="/img/full-screen-image-3.jpg" alt="...">
                    </div>
                    <div class="content">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="http://gravatar.duoshuo.com/avatar/{{ md5(Auth::user()->email) }}?s=72&amp;r=G&amp;d=mm" alt="{{ Auth::user()->name }}">
                                <h4 class="title">{{ Auth::user()->name }}<br></h4>
                            </a>
                        </div>
                        <p class="description text-center">{{ $options->description }}</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop