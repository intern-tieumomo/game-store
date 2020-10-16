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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles('resources/styles/client/custom.css', 'public/client/styles/custom.css')
    .scripts('resources/scripts/client/cart.js', 'public/client/scripts/cart.js')
    .scripts('resources/scripts/client/cart-detail.js', 'public/client/scripts/cart-detail.js')
    .scripts('resources/scripts/client/checkout.js', 'public/client/scripts/checkout.js')
    .scripts('resources/scripts/client/localization.js', 'public/client/scripts/localization.js')
    .scripts('resources/scripts/client/profile.js', 'public/client/scripts/profile.js')
    .scripts('resources/scripts/client/redirect.js', 'public/client/scripts/redirect.js')
    .scripts('resources/scripts/client/become-publisher.js', 'public/client/scripts/become-publisher.js')
    .scripts('resources/scripts/client/owned-games.js', 'public/client/scripts/owned-games.js')
    .scripts('resources/scripts/client/publish-game.js', 'public/client/scripts/publish-game.js')
    .scripts('resources/scripts/client/blog-detail.js', 'public/client/scripts/blog-detail.js')
    .scripts('resources/scripts/client/game-detail.js', 'public/client/scripts/game-detail.js')
    .scripts('resources/scripts/client/game.js', 'public/client/scripts/game.js');
