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

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/sass/app.scss', 'public/assets/css');

// mix.setPublicPath('public/assets');
// mix.setResourceRoot('/assets/');

mix.copyDirectory('resources/images', 'public/assets/images');
mix.copy('node_modules/vue-multiselect/dist/vue-multiselect.min.css', 'public/assets/css/vue-multiselect.min.css');
