@extends('admin.home')
@section('content')
    @if(Auth::check())
        <script>
            window.location.href = '/admin/dashboard'
        </script>
    @endif
    <div class="login-container">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Errors container -->
                    <div class="errors-container"></div>
                    <!-- Add class "fade-in-effect" for login form effect -->
                    {!! Form::open(['url'=>'/admin/signin','id'=>'login','class'=>'login-form fade-in-effect']) !!}
                        <div class="login-header">
                            <a href="#" class="logo">
                                <img src="/images/logo@2x.png" alt="" width="80" />
                            </a>
                            <p>Dear user, log in to access the admin area!</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('login', 'Username', ['class'=>'control-label']) !!}
                            {!! Form::text('login', null, ['id'=>'login', 'class' => 'form-control input-dark']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
                            {!! Form::password('password', ['id'=>'password','class' => 'form-control input-dark', 'autocomplete'=>'off']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark  btn-block text-left">
                                <i class="fa-lock"></i>
                                Log In
                            </button>
                        </div>

                        <div class="login-footer">
                            <a href="#">Forgot your password?</a>

                            <div class="info-links">
                                <a href="#">To - Privacy Policy</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- External login -->
                    {{--<div class="external-login">--}}
                        {{--<a href="#" class="facebook">--}}
                            {{--<i class="fa-facebook"></i>--}}
                            {{--Facebook Login--}}
                        {{--</a>--}}
                        {{--<a href="#" class="twitter">--}}
                            {{--<i class="fa-twitter"></i>--}}
                            {{--Login with Twitter--}}
                        {{--</a>--}}
                        {{--<a href="#" class="gplus">--}}
                            {{--<i class="fa-google-plus"></i>--}}
                            {{--Login with Google Plus--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Reveal Login form
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
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
@stop