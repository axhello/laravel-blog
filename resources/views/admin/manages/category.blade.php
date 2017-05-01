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
                        <a href="#" class="btn btn-primary btn-fill btn-wd pull-right">创建分类</a>
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
                                                data-original-title="编辑分类">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip"
                                                data-placement="right"
                                                title=""
                                                class="btn btn-danger btn-simple btn-icon "
                                                data-original-title="删除分类">
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
                                    总共有 {{$cates->count()}} 个分类
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop