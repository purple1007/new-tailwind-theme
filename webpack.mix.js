const mix = require('laravel-mix');
const local = require('./assets/js/utils/local-config');
require('laravel-mix-versionhash');
require('laravel-mix-tailwind');

mix.setPublicPath('./build');

mix.webpackConfig({
    externals: {
        "jquery": "jQuery",
    }
});

if (local.proxy) {
    mix.browserSync({
        proxy: local.proxy,
        injectChanges: false,  // 改為整頁重載，搭配 cache busting 才能拿到新 CSS
        open: false,
        reloadDelay: 300,     // 等 webpack 寫完檔再重載，避免讀到舊檔
        files: [
            'build/**/*.{css,js}',
            'templates/**/*.php',
            'includes/**/*.php',
            'app/**/*.php',
            '*.php',
            'style.css'
        ]
    });
}

mix.tailwind();
mix.js('assets/js/app.js', 'js');
mix.sass('assets/scss/app.scss', 'css');

if (mix.inProduction()) {
    mix.versionHash();
    mix.sourceMaps();
}
