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
                    <h1 class="title">Pages Creating</h1>
                    <p class="description">editors you can use with Xenon theme</p>
                </div>

                <div class="breadcrumb-env">

                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/"><i class="fa-home"></i>Home</a>
                        </li>
                        <li class="active">
                            <strong>Pages</strong>
                        </li>
                    </ol>

                </div>
            </div>
            <br />
            <link rel="stylesheet" href="/css/admin/uikit.css">
            <link rel="stylesheet" href="/css/admin/codemirror.css">
            <link rel="stylesheet" href="/css/admin/codemirror.css">
            <link rel="stylesheet" href="/css/admin/htmleditor.css">

            {!! Form::open(['url'=>'/admin/pages']) !!}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'页面标题']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                <p>{{ url('/pages') }}/ {!! Form::text('slug', null, ['class' => 'slug']) !!} <span>*最好填写英文或者拼音,不允许有空格*</span></p>
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
                <style>
                    .slug {
                        outline: none;
                        border: 1px solid #ccc;
                        border-radius: 2px;
                    }
                </style>
            </div>
            <div class="editor form-group{{ $errors->has('content_raw') ? ' has-error' : '' }}">
                {!! Form::textarea('content_raw', null, ['data-uk-htmleditor'=>'{markdown:true}', 'class' => 'form-control']) !!}
                @if ($errors->has('content_raw'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content_raw') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit('提交啊',['class'=>'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop