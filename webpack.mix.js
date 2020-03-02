const mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

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

mix.options({
    processCssUrls: false,
    postCss: [
        tailwindcss('tailwind.config.js'),
    ],
});

mix.js('resources/js/app.js', 'public')

// mix.postCss('resources/postcss/app.css', 'public/css')

// mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
