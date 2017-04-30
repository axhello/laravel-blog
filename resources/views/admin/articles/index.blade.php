@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header clearfix">
                        <div class="pull-left">
                            <h4 class="title">文章列表</h4>
                            <p class="category">tip: 点击标题可直接编辑文章</p>
                        </div>
                        <a href="/admin/articles/create" class="btn btn-primary btn-fill btn-wd pull-right">撰写文章</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>标题</th>
                                <th>作者</th>
                                <th>更新于</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td><a href="/admin/articles/{{ $article->id }}/edit">{{ $article->title }}</a></td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->updatedat() }}</td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-success btn-simple btn-icon"
                                                data-original-title="编辑文章">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-danger btn-simple btn-icon "
                                                data-original-title="删除文章">
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
                                    总共有 {{$articles->count()}} 篇文章
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