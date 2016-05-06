var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('app.scss');
    //mix.less('admin/xenon.less', 'public/css/admin/dashboard.min.css');
    mix.less('home/main.less', 'public/css/home/main.css');
    mix.less('home/media.less', 'public/css/home/media.css');
    //mix.scripts([
    //    'admin/bootstrap.min.js',
    //    'admin/TweenMax.min.js',
    //    'admin/resizeable.js',
    //    'admin/joinable.js',
    //    'admin/xenon-api.js',
    //    'admin/xenon-toggles.js',
    //    'admin/xenon-widgets.js',
    //    'admin/globalize.js',
    //    'admin/toastr.min.js',
    //    'admin/xenon-custom.js',
    //    'admin/select2.full.min.js',
    //    'admin/sweetalert.min.js'
    //], 'public/js/admin/dashboard.min.js');
    mix.scripts([
        'home/vue.js',
        'home/vue-resource.js',
        'home/vue-validator.js',
        'home/highlight.pack.js',
        'home/marked.min.js',
        'home/main.js'
    ], 'public/js/home/main.js');
});
