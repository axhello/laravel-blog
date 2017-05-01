@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header clearfix">
                        <h4 class="title">文章列表</h4>
                        <p class="category">tip: 点击标题可直接编辑文章</p>
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
                                    <td>{{ $article->updated_at }}</td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-success btn-simple btn-icon"
                                                data-original-title="恢复文章">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip"
                                                data-placement="right"
                                                title=""
                                                class="btn btn-danger btn-simple btn-icon "
                                                data-original-title="彻底删除">
                                            <i class="fa fa-times"></i>
                                        </button>
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
@stop