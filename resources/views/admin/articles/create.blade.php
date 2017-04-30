@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="header">
                        <h4 class="title">撰写文章</h4>
                    </div>
                    <div class="content">
                        <form method="get" action="/" class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章标题</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">分类目录</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">分类标签</label>
                                    <div class="col-sm-8">
                                        <input name="tagsinput" class="tagsinput tag-azure tag-fill" value="" />
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章内容</label>
                                    <div class="col-sm-8">
                                        @include('vendor.ueditor.assets')
                                        <!-- 编辑器容器 -->
                                            <script id="container" name="content" type="text/plain"></script>
                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('container');
                                            ue.ready(function() {
                                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                            });
                                        </script>
                                    </div>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>  <!-- end card -->
            </div>
        </div>
    </div>
@stop