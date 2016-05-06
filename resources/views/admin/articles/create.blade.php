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
                    <h1 class="title">Articles Creating</h1>
                    <p class="description">Combined WYSIWYG editors you can use with Xenon theme</p>
                </div>

                <div class="breadcrumb-env">

                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/"><i class="fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="/admin/articles">Articles</a>
                        </li>
                        <li class="active">
                            <strong>Create</strong>
                        </li>
                    </ol>

                </div>
            </div>
            <br />
            @include('editor::head')
            {!! Form::open(['url'=>'/admin/articles/']) !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'文章标题']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::select('cate_id', $cates, null, ['class' => 'form-control','id'=>'cate_list']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control','multiple'=>'multiple','id'=>'tag_list']) !!}
                </div>
                <div class="editor form-group{{ $errors->has('content_raw') ? ' has-error' : '' }}">
                    {!! Form::textarea('content_raw', null, ['id'=>'Editor', 'class' => 'form-control']) !!}
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