let mix = require('laravel-mix');

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

/* --- STYLE ---*/
mix.sass('node_modules/@mdi/font/scss/materialdesignicons.scss', 'public/css/material.css');
mix.sass('resources/assets/sass/theme/style.scss', 'public/css/theme.css');
mix.sass('resources/assets/sass/style.scss', 'public/css/style.css');


/* --- JAVASCRIPT ---*/
mix.js('resources/assets/js/app.js', 'public/js/app.js');
