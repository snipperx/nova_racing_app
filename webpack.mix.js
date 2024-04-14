// webpack.mix.js

const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix
    // Copy fonts from font-awesome
    .copy('template/lib', 'public/lib')
    // // Compile font-awesome CSS
    // .styles('template/lib/font-awesome/css/font-awesome.css', 'public/css/font-awesome.css')
    // // Compile Ionicons CSS
    // .styles('template/lib/Ionicons/css/ionicons.css', 'public/css/ionicons.css')
    // // Compile perfect-scrollbar CSS
    // .styles('template/lib/perfect-scrollbar/css/perfect-scrollbar.css', 'public/css/perfect-scrollbar.css')
    // // Compile jquery-toggles CSS
    // .styles('template/lib/jquery-toggles/toggles-full.css', 'public/css/toggles-full.css')
    // // Compile rickshaw CSS
    // .styles('template/lib/rickshaw/rickshaw.min.css', 'public/css/rickshaw.min.css')
    // // Compile Amanda CSS
    // .styles('template/css/amanda.css', 'public/css/amanda.css');
