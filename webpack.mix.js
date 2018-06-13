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

/* Frontend style */


/* Backend style */
mix.sass('node_modules/@mdi/font/scss/materialdesignicons.scss', 'public/css/backend/material.css');
mix.sass('resources/assets/backend/sass/theme/style.scss', 'public/css/backend/theme.css');


/* --- JAVASCRIPT ---*/

/* Frontend javascript */

/* Backend javascript */
mix.js('resources/assets/backend/js/app.js', 'public/js/backend/app.js');
