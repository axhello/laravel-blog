@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="header clearfix">
                    <div class="pull-left">
                        <h4 class="title">标签管理</h4>
                        {{--<p class="category">tip: 点击标题可直接编辑文章</p>--}}
                    </div>
                    <a href="#" class="btn btn-primary btn-fill btn-wd pull-right">创建标签</a>
                </div>
                <div class="content">
                    <ul class="tags-list">
                        @foreach($tags as $tag)
                            <li>
                                <a class="tags" href="#">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop