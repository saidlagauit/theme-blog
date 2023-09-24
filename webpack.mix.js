const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js')
    .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css');
