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
                    <h1 class="title">Skin Selector</h1>
                    <p class="description">Select sidebar skins from predefined color palettes</p>
                </div>

                <div class="breadcrumb-env">

                    <ol class="breadcrumb bc-1">
                        <li>
                            <a href="#"><i class="fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Skin Generator</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    var storage = window.localStorage;

                    $("[data-skin]").each(function(i, el) {
                        var $el = $(el), skin = $el.data('skin');
                        $el.find('a').attr('data-set-skin', skin).attr('href', '#setSkin:' + skin);
                    });

                    $("[data-skin-horizontal]").each(function(i, el) {
                        var $el = $(el), skin = $el.data('skin-horizontal');
                        $el.find('a').attr('data-set-skin-horizontal', skin).attr('href', '#setHorizontalSkin:' + skin);
                    });

                    $('[data-set-skin]').on('click', function(ev) {
                        ev.preventDefault();

                        console.log(this);

                        var skin = $(this).data('set-skin'), skin_name = skin ? (' skin-'+skin) : '';
                        var body_classes = public_vars.$body.attr('class').replace(/skin-[a-z]+/i, '');
                        public_vars.$body.attr('class', body_classes).addClass(skin_name);
                        storage.setItem('current-skin', skin);


                    });

                    $(".reset-skin").on('click', function(ev) {
                        ev.preventDefault();

                        var body_classes = public_vars.$body.attr('class').replace(/(\sskin-[a-z]+)/gi, '').replace(/(\shorizontal-menu-skin-[a-z]+)/gi, '').replace(/(\suser-info-navbar-skin-[a-z]+)/gi, '');

                        public_vars.$body.attr('class', body_classes);

                        storage.setItem('current-skin', '');
                        Cookies.set('current-horizontal-skin', '');
                        Cookies.set('current-user-info-navbar-skin', '');
                    });
                });
            </script>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sidebar, Settings Pane and Login/Lockstreen</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <table class="table table-hover middle-align">
                        <thead>
                        <tr>
                            <th>Skin Name</th>
                            <th width="300">Color Palette</th>
                            <th width="300">Skin Activation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-skin="">
                            <td>
                                <a href="#" class="skin-name-link">Default Skin</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette" data-set-skin="">
                                    <span style="background-color: #2c2e2f"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="aero">
                            <td>
                                <a href="#" class="skin-name-link">Aero</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #558C89"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="navy">
                            <td>
                                <a href="#" class="skin-name-link">Navy</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #2c3e50"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="facebook">
                            <td>
                                <a href="#" class="skin-name-link">Facebook</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #3b5998"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="turquoise">
                            <td>
                                <a href="#" class="skin-name-link">Turquise</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #16a085"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="lime">
                            <td>
                                <a href="#" class="skin-name-link">Lime</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #8cc657"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="green">
                            <td>
                                <a href="#" class="skin-name-link">Green</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #27ae60"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="purple">
                            <td>
                                <a href="#" class="skin-name-link">Purple</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #795b95"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="white">
                            <td>
                                <a href="#" class="skin-name-link">White</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #FFF"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="concrete">
                            <td>
                                <a href="#" class="skin-name-link">Concrete</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #a8aba2"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="watermelon">
                            <td>
                                <a href="#" class="skin-name-link">Watermelon</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #b63131"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        <tr data-skin="lemonade">
                            <td>
                                <a href="#" class="skin-name-link">Lemonade</a>
                            </td>
                            <td>
                                <a href="#" class="skin-color-palette">
                                    <span style="background-color: #f5c150"></span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary">Try this skin</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <a class="btn btn-secondary reset-skin">Reset Skin Settings</a>
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