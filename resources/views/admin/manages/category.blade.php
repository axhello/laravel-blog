@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header clearfix">
                        <div class="pull-left">
                            <h4 class="title">分类管理</h4>
                            {{--<p class="category">tip: 点击标题可直接编辑文章</p>--}}
                        </div>
                        <a data-toggle="modal" data-target="#createModal" href="#" class="btn btn-primary btn-fill btn-wd pull-right">创建分类</a>
                    </div>
                    <div class="content table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>分类名</th>
                                <th>Slug</th>
                                <th>更新于</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cates as $cate)
                                <tr>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->slug }}</td>
                                    <td>{{ $cate->created_at }}</td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-success btn-simple btn-icon"
                                                data-original-title="编辑分类"
                                                onclick="edit({{ $cate->id }})">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        {!! Form::open(['url'=>'/admin/category/delete/'.$cate->id, 'method'=>'DELETE', 'style'=>'display:inline-block']) !!}
                                        <button type="submit" rel="tooltip"
                                                data-placement="right"
                                                title="删除分类"
                                                class="btn btn-danger btn-simple btn-icon"
                                                data-original-title="删除分类">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination clearfix">
                            <div class="pagination-detail pull-left">
                                <span class="pagination-info"></span>
                                <span class="page-list">
                                    总共有 {{$cates->count()}} 个分类
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="create-form" method="POST" accept-charset="UTF-8" action="/admin/category">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">创建分类</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>分类名</label>
                            <input type="text" name="name" class="form-control" placeholder="分类名">
                            <input type="hidden" name="sort" value="0">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Slug (建议英文或者拼音)">
                            <input type="hidden" name="sort" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary btn-fill">创建分类</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit-form" method="POST" accept-charset="UTF-8" action="">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">编辑分类</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cname">分类名</label>
                            <input type="text" name="name" id="cname" class="form-control">
                            <input type="hidden" name="sort" value="0">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" name="slug" class="form-control">
                            <input type="hidden" name="sort" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-success btn-fill">提交修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function edit(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                url     : '/admin/category/edit/' + id,
                method  : 'POST',
                dataType: 'json',
                data    : {id: id},
                success : function (resp) {
                    $('#edit-form').attr('action', '/admin/category/update/' + resp.data.id);
                    $('#cname').val(resp.data.name);
                    $('#slug').val(resp.data.slug);
                }
            });
            $('#editModal').modal();
        }
    </script>
@stop