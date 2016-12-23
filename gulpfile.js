const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

/*elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');
});*/

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
        'jquery.dataTables.min.css',
        'metisMenu.min.css',
        'sb-admin-2.css',
        'font-awesome.min.css',
    ]);
});

elixir(function(mix) {
    mix.styles([
        'select2.min.css',
    ], 'public/css/vendor.css');
});

elixir(function(mix) {
    mix.scripts([
        'jquery.min.js',
        'jquery.dataTables.min.js',
        'bootstrap.min.js',
        'metisMenu.min.js',
        'sb-admin-2.js',
        'custom-app.js',
    ]);
});

elixir(function(mix) {
    mix.scripts([
        'select2.min.js',
    ], 'public/js/vendor.js');
});
