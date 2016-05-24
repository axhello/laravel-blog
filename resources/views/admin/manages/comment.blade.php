@extends('admin.home')
@section('content')
    @include('admin.header')
    <div class="page-container">

        @include('admin.sidebar')

        <div class="main-content">
                    <!-- User Info, Notifications and Menu Bar -->
            @include('admin.navbar')

            <div class="page-title">
                <div class="title-env">
                    <h1 class="title">Comments Manage</h1>
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
                            <strong>Comment</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Removing search and results count filter -->
            <div class="panel panel-default">
                <div class="page-error centered">

                    <div class="error-symbol">
                        <i class="fa-warning"></i>
                    </div>

                    <h3>
                        此功能暂不可用哦!
                    </h3>

                    <p>We did not find the page you were looking for!</p>
                    <p>You can search again or contact one of our agents to help you!</p>

                </div>
            </div>
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
    @if ( Session::has('success') )
        <script>
            window.onload = function () {
                toastr.success("{{ Session::get('success') }}", "成功提醒( •̀∀•́ )✧", opts);
            };
        </script>
    @endif
    @if ( Session::has('info') )
        <script>
            window.onload = function () {
                toastr.info('{{ Session::get('info') }}');
            };
        </script>
    @endif
@stop