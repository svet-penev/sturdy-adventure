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

/* --- JAVASCRIPT ---*/

/* Frontend javascript */
mix.js('resources/assets/js/frontend/app.js', 'public/js/frontend');

/* Backend javascript */
mix.js('resources/assets/js/backend/theme/dashboard.js', 'public/js/backend');


/* --- STYLE ---*/

/* Frontend style */
mix.sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend');

/* Backend style */
mix.sass('resources/assets/sass/backend/style.scss', 'public/css/backend/theme.css');
