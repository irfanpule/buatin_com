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

mix.js('resources/assets/js/all.js', 'public/js')

mix.combine([
    'resources/assets/css/style.css',
    'resources/assets/font-awesome/css/font-awesome.css',
    ], 'public/css/all.css');

mix.copy('node_modules/sweetalert/dist/', 'public/sweetalert/');
mix.copy('resources/assets/font-awesome/fonts/', 'public/fonts/');