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
    mix.less('home/main.less', 'public/css/home/main.css');
    mix.less('home/media.less', 'public/css/home/media.css');
    //mix.less('admin/xenon.less', 'public/css/admin/dashboard.min.css');
    //mix.scripts([
    //    'admin/xenon/bootstrap.min.js',
    //    'admin/xenon/TweenMax.min.js',
    //    'admin/xenon/resizeable.js',
    //    'admin/xenon/joinable.js',
    //    'admin/xenon/xenon-api.js',
    //    'admin/xenon/xenon-toggles.js',
    //    'admin/xenon/toastr.min.js',
    //    'admin/xenon/jquery.validate.min.js',
    //    'admin/xenon/xenon-custom.js',
    //    'admin/min/select2.full.min.js',
    //    'admin/min/sweetalert.min.js',
    //    'admin/min/uikit.min.js',
    //    'admin/min/codemirror.js',
    //    'admin/min/markdown.js',
    //    'admin/min/overlay.js',
    //    'admin/min/xml.js',
    //    'admin/min/gfm.js',
    //    'admin/min/marked.js',
    //    'admin/min/htmleditor.js'
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
