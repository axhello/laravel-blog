@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header clearfix">
                        <h4 class="title">回收站文章</h4>
                        {{--<p class="category">tip: 点击标题可直接编辑文章</p>--}}
                    </div>
                    <div class="content table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>标题</th>
                                <th>作者</th>
                                <th>删除于</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->deleted_at }}</td>
                                    <td class="td-actions">
                                        <a href="/admin/articles/restore/{{$article->id}}"
                                           rel="tooltip"
                                           data-placement="left"
                                           title="恢复文章"
                                           class="btn btn-success btn-simple btn-icon"
                                           data-original-title="恢复文章">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                        <a onclick="confirmDelete({{$article->id}})"
                                           rel="tooltip"
                                           data-placement="right"
                                           title="彻底删除"
                                           class="btn btn-danger btn-simple btn-icon "
                                           data-original-title="彻底删除">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination clearfix">
                            <div class="pagination-detail pull-left">
                                <span class="pagination-info"></span>
                                <span class="page-list">
                                    回收站总共有 {{$articles->count()}} 篇文章
                                </span>
                            </div>
                            <div class="pagination pull-right">
                                {!! $articles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            swal({
                title: '确定删除?',
                text: "确认将从数据库中删除文章，无法恢复!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '是的, 删除!',
                cancelButtonText: '取消'
            }).then(function () {
                window.location.href = '/admin/articles/delete/'+ id
            }).catch(swal.noop)
        }
    </script>
@stop