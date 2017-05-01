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
    // 后台css文件
    mix.copy([
        'resources/assets/css/admin/bootstrap.min.css',
        'resources/assets/css/admin/animate.min.css',
        'resources/assets/css/admin/pe-icon-7-stroke.css',
        'resources/assets/css/admin/font-awesome.min.css',
        'resources/assets/css/admin/light-bootstrap-dashboard.css',
        'resources/assets/css/admin/dashboard.css',
        'resources/assets/css/admin/sweetalert2.min.css',
        'resources/assets/css/admin/select2.min.css'
    ], 'public/css/admin');
    mix.copy('resources/assets/css/fonts/*.{ttf,eot,svg,woff,woff2}', 'public/css/fonts');
    // Uikit Editor
    mix.copy('resources/assets/ukeditor/**/*', 'public/ukeditor');
    // mix.sass('admin/dashboard.scss', 'public/css/admin/dashboard.min.css');
    // mix.scripts([ 'moon/vue.min.js', 'moon/main.js'], 'public/js/moon/main.min.js');
    // mix.scripts([
    //    'home/vue.js',
    //    'home/vue-resource.js',
    //    'home/highlight.pack.js',
    //    'home/main.js'
    // ], 'public/js/home/main.js');
    // 图片文件
    mix.copy('resources/assets/img/*.{jpg,png,gif,svg}', 'public/img');
    // 后台js文件
    mix.copy([
        'resources/assets/js/admin/jquery.min.js',
        'resources/assets/js/admin/bootstrap.min.js',
        'resources/assets/js/admin/bootstrap-checkbox-radio-switch-tags.js',
        'resources/assets/js/admin/bootstrap-notify.js',
        'resources/assets/js/admin/bootstrap-select.js',
        'resources/assets/js/admin/chartist.min.js',
        'resources/assets/js/admin/light-bootstrap-dashboard.js',
        'resources/assets/js/admin/jquery.validate.min.js',
        'resources/assets/js/admin/select2.min.js',
        'resources/assets/js/admin/sweetalert2.min.js',
        'resources/assets/js/admin/demo.js'
    ], 'public/js/admin');
});
