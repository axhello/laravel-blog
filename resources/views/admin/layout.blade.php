<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="" />

    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/admin/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="/css/admin/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin/select2.min.css">
    <link rel="stylesheet" href="/css/admin/sweetalert.css">
    <link rel="stylesheet" href="/css/admin/dashboard.min.css">
    <script src="/js/admin/jquery.min.js"></script>
</head>
<body class="page-body {{ Route::current()->uri() === 'admin' ? 'login-page' : ''}}">

@yield('content')

<script src="/js/admin/dashboard.min.js"></script>
<script src="/js/admin/custom.js"></script>
</body>
</html>