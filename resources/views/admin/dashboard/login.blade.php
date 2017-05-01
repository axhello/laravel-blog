@if(Auth::check())
    <script>window.location.href = '/admin/dashboard'</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="" />

    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/admin/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/animate.min.css">
    <link rel="stylesheet" href="/css/admin/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/css/admin/light-bootstrap-dashboard.css">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
</head>
<body>
<div class="wrapper" style="overflow: hidden;">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Blog Dashboard</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="full-page login-page" data-color="blue" data-image="/img/full-screen-image-3.jpg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form id="login" method="POST">
                            {{csrf_field()}}
                            <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Dashboard Login</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>用户名</label>
                                        <input type="text" name="login" placeholder="用户名或者邮箱" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>密码</label>
                                        <input type="password" name="password" placeholder="输入密码" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted">
                                            <a href="#" style="color: #999;">忘记密码？</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-info btn-wd">登录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-transparent">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="/">
                                返回首页
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    © 2017 <a href="https://ciyuanai.net">Ciyuanai.net</a>
                </p>
            </div>
        </footer>
        <div class="full-page-background" style="background-image: url(http://demos.creative-tim.com/light-bootstrap-dashboard-pro/assets/img/full-screen-image-2.jpg); display: block;"></div></div>
    </div>
</body>
<script src="/js/admin/jquery.min.js"></script>
<script src="/js/admin/jquery.min.js"></script>
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/bootstrap-checkbox-radio-switch-tags.js"></script>
<script src="/js/admin/chartist.min.js"></script>
<script src="/js/admin/bootstrap-notify.js"></script>
<script src="/js/admin/jquery.validate.min.js"></script>
<script src="/js/admin/light-bootstrap-dashboard.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // Reveal Login form
        setTimeout(function(){ $(".card").removeClass('card-hidden');}, 500);
        // Validation and Ajax action
        $("form#login").validate({
            rules: {
                login: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                login: {
                    required: '请输入用户名或者邮箱'
                },
                password: {
                    required: '请输入密码'
                }
            },
            // Form Processing via AJAX
            submitHandler: function(form)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    }
                });
                console.log($(form).find('[name="login"]').val());
                $.ajax({
                    url: "/admin/login",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        login: $(form).find('[name="login"]').val(),
                        password: $(form).find('[name="password"]').val()
                    },
                    success: function(resp) {
                        console.log(resp);
                        if(resp.access) {
                            window.location.href = '/admin/dashboard';
                        } else {
                            $.notify({
                                icon: 'pe-7s-bell',
                                message: '用户名或者密码输入错误！请重试！'
                            },{
                                type: "danger"
                            });
                        }

                    }
                });
            }
        });

        // Set Form focus
        $("form#login .form-group:has(.form-control):first .form-control").focus();
    });
</script>
</html>