const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/calendar.js', 'public/js')
   .js('resources/js_calendar/core/main.js', 'public/js/core')
   .js('resources/js_calendar/daygrid/main.js', 'public/js/daygrid')
   .js('resources/js_calendar/interaction/main.js', 'public/js/interaction');
