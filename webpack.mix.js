const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.combine([
    'resources/assets/css/style.css',
    'resources/assets/css/jquery.Jcrop.min.css',
    'resources/assets/font-awesome/css/font-awesome.css',
    'node_modules/sweetalert/dist/sweetalert.css',
    ], 'public/css/all.css')
    .combine([
    'node_modules/jquery/dist/jquery.js',
    'resources/assets/js/all.js',
    'resources/assets/js/jquery.Jcrop.min.js',
    'node_modules/sweetalert/dist/sweetalert.min.js',
    ], 'public/js/bundle.js');

mix.copy('resources/assets/font-awesome/fonts/', 'public/fonts/');