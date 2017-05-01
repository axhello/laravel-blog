@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-push-4">
                <div class="card">
                    <div class="header">
                        <legend><h4 class="title">基本设置</h4></legend>
                    </div>
                    <div class="content">
                        {!! Form::model($user,['url'=>'/admin/user/update/'.$user->id, 'method'=>'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '用户名') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', '电子邮件') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('old_password', '当前密码') !!}
                            {!! Form::password('old_password', ['class' => 'form-control', 'placeholder'=>'当前密码']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('new_password', '新密码') !!}
                            {!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=>'新密码']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('new_password', '确认密码') !!}
                            {!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=>'确认密码']) !!}
                        </div>
                        <div class="text-right">
                            {!! Form::submit('提交修改',['class'=>'btn btn-info btn-fill']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-pull-8">
                <div class="card card-user">
                    <div class="image">
                        <img src="/img/full-screen-image-3.jpg" alt="...">
                    </div>
                    <div class="content">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray"
                                     src="http://gravatar.duoshuo.com/avatar/{{ md5(Auth::user()->email) }}?s=72&amp;r=G&amp;d=mm"
                                     alt="{{ Auth::user()->name }}">
                                <h4 class="title">{{ Auth::user()->name }}<br></h4>
                            </a>
                        </div>
                        <p class="description text-center">{{ $options->description }}</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop