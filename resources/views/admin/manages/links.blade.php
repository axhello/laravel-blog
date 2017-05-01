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
                        <a href="/admin/links/create" class="btn btn-primary btn-fill btn-wd pull-right">添加友链</a>
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
                                        <button type="button" rel="tooltip"
                                                data-placement="left"
                                                title=""
                                                class="btn btn-success btn-simple btn-icon"
                                                data-original-title="编辑文章">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip"
                                                data-placement="right"
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
                                    总共有 {{$links->count()}} 个友链
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop