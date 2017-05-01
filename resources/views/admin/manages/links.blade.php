@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header clearfix">
                        <div class="pull-left">
                            <h4 class="title">友链管理</h4>
                            {{--<p class="category">tip: 点击标题可直接编辑文章</p>--}}
                        </div>
                        <a data-toggle="modal" data-target="#createModal" href="#" class="btn btn-primary btn-fill btn-wd pull-right">添加友链</a>
                    </div>
                    <div class="content table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>头像</th>
                                <th>名字</th>
                                <th>链接</th>
                                <th>描述</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td><img src="{{ $link->image}}" alt="" width="32" height="32"></td>
                                    <td>{{ $link->name }}</td>
                                    <td>{{ $link->url }}</td>
                                    <td>{{ $link->description }}</td>
                                    <td class="td-actions">
                                        <button type="button"
                                                onclick="edit({{$link->id}})"
                                                rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-success btn-simple btn-icon"
                                                data-original-title="编辑友链">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        {!! Form::open(['url'=>'/admin/links/delete/'.$link->id,'method'=>'DELETE', 'id'=>'del-form', 'style'=>'display:inline-block']) !!}
                                            <button type="submit"
                                                    onclick="deleted()"
                                                    rel="tooltip"
                                                    data-placement="right"
                                                    title=""
                                                    class="btn btn-danger btn-simple btn-icon"
                                                    data-original-title="删除友链">
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
                                    总共有 {{$links->count()}} 个友链
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">添加友链</h4>
                </div>
                <form method="POST" action="/admin/links" accept-charset="UTF-8">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">名字</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="必填">
                        </div>

                        <div class="form-group">
                            <label for="url" class="control-label">链接</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="必填">
                        </div>

                        <div class="form-group">
                            <label for="image" class="control-label">图片(链接)</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="可选">
                        </div>

                        <div class="form-group no-margin">
                            <label for="description" class="control-label">描述</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="可选">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary btn-fill">添加友链</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-form" method="POST" accept-charset="UTF-8" action="">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">修改友链</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="l-name" class="control-label">名字</label>
                            <input type="text" class="form-control" name="name" id="l-name" placeholder="必填">
                        </div>

                        <div class="form-group">
                            <label for="l-url" class="control-label">链接</label>
                            <input type="text" class="form-control" name="url" id="l-url" placeholder="必填">
                        </div>

                        <div class="form-group">
                            <label for="l-image" class="control-label">图片(链接)</label>
                            <input type="text" class="form-control" name="image" id="l-image" placeholder="可选">
                        </div>

                        <div class="form-group no-margin">
                            <label for="l-desc" class="control-label">描述</label>
                            <input type="text" class="form-control" name="description" id="l-desc" placeholder="可选">
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
                url     : "/admin/links/edit/" + id,
                method  : 'GET',
                dataType: 'json',
                success : function (resp) {
                    console.log(resp.data.id);
                    $('#edit-form').attr('action', '/admin/links/update/' + resp.data.id);
                    $('#l-name').val(resp.data.name);
                    $('#l-url').val(resp.data.url);
                    $('#l-image').val(resp.data.image);
                    $('#l-desc').val(resp.data.description);
                }
            });
            $('#editModal').modal();
        }
        function deleted(e) {
            e.preventDefault();
            swal({
                title: '确定删除?',
                text: "确认删除后将无法恢复!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33333',
                confirmButtonText: '是的, 删除!',
                cancelButtonText: '取消'
            }).then(function () {
                $('#del-form').submit()
            }).catch(swal.noop);

        }
    </script>
@stop