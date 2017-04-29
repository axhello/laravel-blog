@extends('admin.layout')
@section('content')
    @include('admin.header')

    <div class="page-container">

        @include('admin.sidebar')

        <div class="main-content">
            <!-- User Info, Notifications and Menu Bar -->
            @include('admin.navbar')

            <div class="row">
                <div class="col-sm-3">
                    <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
                        <div class="xe-icon">
                            <i class="linecons-cloud"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">0.0%</strong>
                            <span>Server uptime</span>
                        </div>
                    </div>

                    <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="117" data-suffix="k" data-duration="3" data-easing="false">
                        <div class="xe-icon">
                            <i class="linecons-user"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">1k</strong>
                            <span>Users Total</span>
                        </div>
                    </div>

                    <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1000" data-to="2470" data-duration="4" data-easing="true">
                        <div class="xe-icon">
                            <i class="linecons-camera"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">1000</strong>
                            <span>New Daily Photos</span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="chart-item-bg">
                        <div class="chart-label">
                            <div class="h3 text-secondary text-bold" data-count="this" data-from="0.00" data-to="14.85" data-suffix="%" data-duration="1">0.00%</div>
                            <span class="text-medium text-muted">More visitors</span>
                        </div>
                        <div id="pageviews-visitors-chart" style="height: 298px;"></div>
                    </div>

                </div>
                <div class="col-sm-3">

                    <div class="chart-item-bg">
                        <div class="chart-label chart-label-small">
                            <div class="h4 text-purple text-bold" data-count="this" data-from="0.00" data-to="95.8" data-suffix="%" data-duration="1.5">0.00%</div>
                            <span class="text-small text-upper text-muted">Current Server Uptime</span>
                        </div>
                        <div id="server-uptime-chart" style="height: 134px;"></div>
                    </div>

                    <div class="chart-item-bg">
                        <div class="chart-label chart-label-small">
                            <div class="h4 text-secondary text-bold" data-count="this" data-from="0.00" data-to="320.45" data-decimal="," data-duration="2">0</div>
                            <span class="text-small text-upper text-muted">Avg. of Sales</span>
                        </div>
                        <div id="sales-avg-chart" style="height: 134px; position: relative;">
                            <div style="position: absolute; top: 25px; right: 0; left: 40%; bottom: 0"></div>
                        </div>
                    </div>
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

    <div class="page-loading-overlay">
        <div class="loader-inner">
            <div class="semi-circle-spin"><div></div></div>
        </div>
    </div>
@stop