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
<div class="wrapper">
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
    <div class="full-page login-page" data-color="blue" data-image="../../assets/img/full-screen-image-1.jpg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="#" action="#">
                            <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Dashboard Login</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>用户名</label>
                                        <input type="text" placeholder="用户名或者邮箱" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>密码</label>
                                        <input type="password" placeholder="输入密码" class="form-control">
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
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
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
                    required: 'Please enter your username.'
                },

                password: {
                    required: 'Please enter your password.'
                }
            },

            // Form Processing via AJAX
            submitHandler: function(form)
            {
                show_loading_bar(60); // Fill progress bar to 70% (just a given value)

                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-full-width",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    }
                });

                $.ajax({
                    url: "/admin/login",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        do_login: true,
                        login: $(form).find('#login').val(),
                        password: $(form).find('#password').val()
                    },
                    success: function(resp) {
                        show_loading_bar({
                            delay: .5,
                            pct: 100,
                            finish: function(){
                                // Redirect after successful login page (when progress bar reaches 100%)
                                if(resp.access) {
                                    window.location.href = '/admin/dashboard';
                                } else {
                                    toastr.error("You have entered wrong password, please try again. Invalid Login!", opts);
                                    $password.select();
                                }
                            }
                        });
                    }
                });
            }
        });

        // Set Form focus
        $("form#login .form-group:has(.form-control):first .form-control").focus();
    });
</script>
</html>