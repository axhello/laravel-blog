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
            @include('admin.sidebar')
            @include('admin.navbar')
            <div class="main-panel">
                <div class="content">
                    @yield('content')
                </div>
                @include('admin.footer')
            </div>
        </div>
    </body>
    <script src="/js/admin/jquery.min.js"></script>
    <script src="/js/admin/bootstrap.min.js"></script>
    <script src="/js/admin/bootstrap-checkbox-radio-switch-tags.js"></script>
    <script src="/js/admin/chartist.min.js"></script>
    <script src="/js/admin/bootstrap-notify.js"></script>
    <script src="/js/admin/sweetalert2.js"></script>
    <script src="/js/admin/light-bootstrap-dashboard.js"></script>
    <script src="/js/admin/demo.js"></script>
</html>