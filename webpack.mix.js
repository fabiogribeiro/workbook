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

/**
 * Compile js/css assets to public
 */
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/vendor.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');

/**
 * Bust cache when changes happen in production
 */
if (mix.inProduction()) {
   mix.version();
}

/**
 * Use browserSync on development server
 */
mix.browserSync('localhost:8000');
