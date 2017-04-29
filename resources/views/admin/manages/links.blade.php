@extends('admin.layout')
@section('content')
    @include('admin.header')
    <div class="page-container">

        @include('admin.sidebar')

        <div class="main-content">
            <!-- User Info, Notifications and Menu Bar -->
            @include('admin.navbar')

            <div class="page-title">
                <div class="title-env">
                    <h1 class="title">Friendship link</h1>
                    <p class="description">Dynamic table variants with pagination and other controls</p>
                </div>
                <div class="breadcrumb-env">
                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="/admin/dashboard"><i class="fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="#">Manages</a>
                        </li>
                        <li class="active">
                            <strong>Links</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Responsive Table -->
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">友情链接管理</h3>
                            <div class="panel-options">
                                <a href="#" data-toggle="panel">
                                    <span class="collapse-icon">–</span>
                                    <span class="expand-icon">+</span>
                                </a>
                                <a href="#" data-toggle="remove">
                                    ×
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-wrapper">
                                <div class="table-responsive">
                                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>图片</th>
                                            <th>名字</th>
                                            <th data-priority="1">链接</th>
                                            <th data-priority="1">描述</th>
                                            <th data-priority="1">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($links as $link)
                                            <tr>
                                                <td>
                                                    <img src="{{ $link->image}}" alt="" width="32" height="32">
                                                </td>
                                                <td>
                                                    <div class="name">{{ $link->name }}</div>
                                                </td>
                                                <td data-priority="1" colspan="1">{{ $link->url }}</td>
                                                <td data-priority="1" colspan="1">{{ $link->description }}</td>
                                                <td data-priority="1" colspan="1">
                                                    {!! Form::open(['url'=>'/admin/links/delete/'.$link->id,'method' => 'DELETE']) !!}
                                                        <a href="javascript:;" onclick="Onedit({{ $link->id }})" class="btn btn-secondary btn-sm btn-icon icon-left">Edit</a>
                                                        <button type="submit" class="btn btn-danger btn-sm btn-icon icon-left">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="row" class="row">
                                    <div class="col-xs-2">
                                        <a href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-info btn-block icon-left">
                                            创建友链
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.notice')
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                        
                    }
                });

               function Onedit(id) {
                   $.ajax({
                       url: "/admin/links/edit/"+id,
                       method: 'GET',
                       dataType: 'json',
                       success: function(resp) {
                           console.log(resp.data.id);
                           $('#update-form').attr('action','/admin/links/update/'+resp.data.id);
                           $('#modal-7').modal('show', {backdrop: 'static'});
                           $('#name-u').val(resp.data.name);
                           $('#url-u').val(resp.data.url);
                           $('#image-u').val(resp.data.image);
                           $('#description-u').val(resp.data.description);
                       }
                   });
               }
            </script>
            <footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; 2014
                        <strong>Xenon</strong>
                        More Templates
                    </div>
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id="modal-6" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">添加一个友情链接</h4>
                </div>
                {!! Form::open(['url'=>'/admin/links']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">名字</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="必填">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="url" class="control-label">链接</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="必填">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image" class="control-label">图片(链接)</label>
                                <input type="text" class="form-control" name="image" id="image" placeholder="可选">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="description" class="control-label">描述</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="可选">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-7" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">修改一个友情链接</h4>
                </div>
                <form id="update-form" method="POST" accept-charset="UTF-8">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name-u" class="control-label">名字</label>
                                    <input type="text" class="form-control" name="name" id="name-u" placeholder="必填">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url-u" class="control-label">链接</label>
                                    <input type="text" class="form-control" name="url" id="url-u" placeholder="必填">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image-u" class="control-label">图片(链接)</label>
                                    <input type="text" class="form-control" name="image" id="image-u" placeholder="可选">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="description-u" class="control-label">描述</label>
                                    <input type="text" class="form-control" name="description" id="description-u" placeholder="可选">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-white">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop