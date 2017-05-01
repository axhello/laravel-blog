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
                    <div class="content table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>标题</th>
                                <th>更新于</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td><a class="table-text" href="/admin/pages/{{ $page->id }}/edit">{{ $page->title }}</a></td>
                                    <td>{{ $page->updated_at }}</td>
                                    <td class="td-actions">
                                        <a href="/admin/pages/{{ $page->id }}/edit"
                                           rel="tooltip"
                                           data-placement="left"
                                           title="编辑页面"
                                           class="btn btn-success btn-simple btn-icon"
                                           data-original-title="编辑页面">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['url'=>'/admin/pages/'.$page->id, 'method'=>'DELETE', 'style'=>'display:inline-block']) !!}
                                        <button type="submit" rel="tooltip"
                                                data-placement="right"
                                                title="删除页面"
                                                class="btn btn-danger btn-simple btn-icon "
                                                data-original-title="删除页面">
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
                                    总共有 {{$pages->count()}} 篇文章
                                </span>
                            </div>
                            <div class="pagination pull-right">
                                {!! $pages->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop