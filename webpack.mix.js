const mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss') // Jika menggunakan SASS
    .js('resources/js/app.js')
    .postCss('resources/css/app.css', [
        require('tailwindcss'),
    ]);
