const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
*/

mix.sass('resources/views/scss/style.scss', 'assets/css/style.css');
mix.js('resources/js/dashboard.js', 'assets/js/dashboard.js');

mix.js('node_modules/jquery/dist/jquery.min.js', 'assets/js/jquery.min.js');
// Impotação do Bootstrap 5
mix.postCss('node_modules/bootstrap/dist/css/bootstrap.min.css', 'assets/css/bootstrap.min.css');
mix.js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'assets/js/bootstrap.bundle.min.js');

// Importação Bootstrap Icons
mix.postCss('node_modules/bootstrap-icons/font/bootstrap-icons.css', 'assets/css/bootstrap-icons.css');