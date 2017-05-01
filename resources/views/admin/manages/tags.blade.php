@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="header clearfix">
                    <div class="pull-left">
                        <h4 class="title">标签管理</h4>
                        <p class="category">tip: 点击标签可进行操作</p>
                    </div>
                    <a data-toggle="modal" data-target="#createModal" href="#" class="btn btn-primary btn-fill btn-wd pull-right">创建标签</a>
                </div>
                <div class="content">
                    <ul class="tags-list">
                        @foreach($tags as $tag)
                            <li>
                                <a class="tags" onclick="confirmAction({{ $tag->id }})" href="#">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="create-form" method="POST" accept-charset="UTF-8" action="/admin/tags">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">添加标签</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>标签名</label>
                            <input type="text" name="name" class="form-control" placeholder="标签名">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary btn-fill">添加标签</button>
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
                        <h4 class="modal-title">编辑标签</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tag-name">标签名</label>
                            <input id="tag-name" type="text" name="name" class="form-control">
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
        function confirmAction(id) {
            swal({
                title: '选择操作',
                text: "选择下一步要进行的操作!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#87CB16',
                cancelButtonColor: '#d33333',
                confirmButtonText: '编辑标签',
                cancelButtonText: '删除标签'
            }).then(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    }
                });
                $.ajax({
                    url     : '/admin/tags/edit/' + id,
                    method  : 'POST',
                    dataType: 'json',
                    data    : {id: id},
                    success : function (resp) {
                        console.log(resp);
                        $('#edit-form').attr('action', '/admin/tags/update/' + resp.data.id);
                        $('#tag-name').val(resp.data.name);
                    }
                });
                $('#editModal').modal();
            }).catch(function () {
                console.log('quxiao')
            })
        }
    </script>
@stop