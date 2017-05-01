@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <legend><h4 class="title">添加用户</h4></legend>
                    </div>
                    <div class="content">
                        <form method="get" action="/" class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-1">用户名</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="field-1" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-2">密码</label>
                                    <div class="col-sm-4">
                                        <input type="password" name="password" class="form-control" id="field-2" placeholder="Password">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label" for="field-3">电子邮箱</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="field-3" placeholder="Enter your email">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-sm-2 col-sm-offset-2"></div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-info btn-fill btn-block" value="添加用户">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>  <!-- end card -->

            </div>
        </div>
    </div>
@stop