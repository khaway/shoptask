const mix = require('laravel-mix');
const glob = require('glob-all');
require('laravel-mix-purgecss');
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

mix.js('resources/js/app.js', 'public/js')

mix.postCss('resources/postcss/app.css', 'public/css')

if (process.env.NODE_ENV === 'production') {
    mix.purgeCss({
        // Will *only* look for views and simplemde classes
        paths: () => glob.sync([
            path.join(__dirname, 'resources/**/*.vue'),
        ]),
        whitelistPatterns: [/fa/, /fab/, /icon/, /modal/, /fade/],
        extractorPattern: /[\w-/:]+(?<!:)/g,
    });
}

mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
