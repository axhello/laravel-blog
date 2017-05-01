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
                    <h1 class="title">Tags Manage</h1>
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
                            <strong>Tags</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Removing search and results count filter -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Removing search and results count filter</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped" id="example">
                        <thead>
                        <tr>
                            <th>分类</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="middle-align">
                        @foreach($tags as $tag)
                            <tr role="row" class="odd">
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <form action="/admin/tags/delete/{{ $tag->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                        <a href="#" onclick="edit({{ $tag->id }})" class="btn btn-secondary btn-sm btn-icon icon-left">Edit</a>
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm btn-icon icon-left">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div id="create" class="row">
                        {!! Form::open(['url'=>'admin/tags']) !!}
                        <div class="col-xs-5">
                            <div class="dataTables_info{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'标签']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-info btn-block icon-left">
                                创建标签
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div id="update" class="row" style="display: none">
                        <form id="edit-form" method="POST" accept-charset="UTF-8" action="">
                            {{ method_field('PATCH') }}
                            {!! csrf_field() !!}
                            <div class="col-xs-5">
                                <div class="dataTables_info">
                                    <input id="edit" type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-secondary btn-block icon-left">
                                    更新分类
                                </button>
                            </div>
                        </form>
                    </div>
                    <script>
                        function edit(id) {
                            $('#create').css('display','none');
                            $('#update').css('display','block');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                                }
                            });
                            $.ajax({
                                url: '/admin/tags/edit/'+ id,
                                method: 'POST',
                                dataType: 'json',
                                data: { id: id },
                                success: function(response) {
                                    console.log(response);
                                    $('#edit-form').attr('action','/admin/tags/update/'+ response.data.id);
                                    $('#edit').val(response.data.name);
                                },
                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
            @include('admin.notice')
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
@stop