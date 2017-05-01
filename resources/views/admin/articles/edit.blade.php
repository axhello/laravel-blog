@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">编辑文章</h4>
                    </div>
                    <div class="content">
                        {!! Form::model($article, ['url'=>'admin/articles/'.$article->id, 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
                        <fieldset>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <div class="col-sm-10 col-md-offset-1">
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'文章标题', 'autocomplete'=>'off']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="col-sm-10 col-md-offset-1">
                                    {!! Form::select('cate_id', $cates, null, ['class' => 'form-control','id'=>'cate_list']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="col-sm-10 col-md-offset-1">
                                    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control','multiple'=>'multiple','id'=>'tag_list']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group {{ $errors->has('content_raw') ? 'has-error' : '' }}">
                                <div class="col-sm-10 col-md-offset-1">
                                    {!! Form::textarea('content_raw', null, ['data-uk-htmleditor'=>'{maxsplitsize:800, markdown:true}', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="col-sm-2 col-md-offset-9">
                                {!! Form::submit('提交',['class'=>'btn btn-fill btn-block btn-info']) !!}
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="/ukeditor/css/codemirror.css">
    <link rel="stylesheet" href="/ukeditor/css/highlight.css">
    <link rel="stylesheet" href="/ukeditor/css/htmleditor.css">
    <link rel="stylesheet" href="/css/admin/select2.min.css">
    <script src="/js/admin/jquery.min.js"></script>
    <script src="/ukeditor/js/uikit.min.js"></script>
    <script src="/ukeditor/js/highlight.js"></script>
    <script src="/ukeditor/js/codemirror.js"></script>
    <script src="/ukeditor/js/marked.js"></script>
    <script src="/ukeditor/js/htmleditor.js"></script>
    <script src="/js/admin/select2.min.js"></script>
    <script>$("#cate_list").select2();$("#tag_list").select2({ placeholder:'分类标签', tags: true});</script>
@stop