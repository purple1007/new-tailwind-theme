const mix = require('laravel-mix');
const path = require('path');
const fs = require('fs');
const local = require('./assets/js/utils/local-config');
require('laravel-mix-purgecss');

const HASH_LENGTH = 6;
const isProduction = mix.inProduction();

mix.setPublicPath(isProduction ? './build' : './build/local');
mix.disableNotifications();

mix.webpackConfig({
    externals: {
        "jquery": "jQuery",
    },
    watchOptions: {
        ignored: ['**/node_modules/**', '**/build/**'],
    },
});

if (local.proxy) {
    mix.browserSync({
        proxy: local.proxy,
        injectChanges: false,
        notify: false,
        open: false,
        reloadDelay: 300,
        files: [
            'templates/**/*.php',
            'includes/**/*.php',
            'app/**/*.php',
            '*.php',
            'style.css'
        ]
    });
}

mix.js('assets/js/app.js', 'js');
mix.sass('assets/scss/app.scss', 'css')
    .options({
        processCssUrls: false,
        postCss: [require('@tailwindcss/postcss')],
    });

if (!isProduction) {
    mix.then(() => {
        const manifestPath = path.resolve(__dirname, 'build/local-manifest.json');
        const manifest = {
            '/js/app.js': '/local/js/app.js',
            '/css/app.css': '/local/css/app.css',
        };
        const content = JSON.stringify(manifest, null, 4) + '\n';

        fs.mkdirSync(path.dirname(manifestPath), { recursive: true });

        if (!fs.existsSync(manifestPath) || fs.readFileSync(manifestPath, 'utf8') !== content) {
            fs.writeFileSync(manifestPath, content);
        }
    });
}

mix.override((config) => {
    const findSassLoaders = (obj) => {
        if (!obj) return;
        if (Array.isArray(obj)) {
            obj.forEach(item => findSassLoaders(item));
            return;
        }
        if (typeof obj === 'object') {
            if (obj.loader && typeof obj.loader === 'string' && obj.loader.includes('sass-loader')) {
                obj.options = obj.options || {};
                obj.options.api = 'modern-compiler';
                obj.options.sassOptions = {
                    ...(obj.options.sassOptions || {}),
                    silenceDeprecations: ['import'],
                };
            }
            if (obj.use) findSassLoaders(obj.use);
            if (obj.oneOf) findSassLoaders(obj.oneOf);
            if (obj.rules) findSassLoaders(obj.rules);
        }
    };
    config.module.rules.forEach(findSassLoaders);
});

if (isProduction) {
    mix.purgeCss({
        content: [
            './*.php',
            './templates/**/*.php',
            './includes/**/*.php',
            './app/**/*.php',
            './assets/js/**/*.js',
            './assets/scss/**/*.scss',
        ],
        safelist: {
            greedy: [
                /-active$/,
                /^nav-/,
                /^wp-/,
                /^align/,
                /^is-/,
                /^has-/,
                /^wp-block/,
                /^gallery/,
                /^lightbox/,
                /^menu-/,
                /^sub-menu/,
                /^page-numbers/,
                /^screen-reader/,
                /^widget_/,
                /^custom_sub/,
                /^mfp-/,
                /^rl-/,
                /^hcb_/,
                /^toc_/,
            ],
        },
    });
    mix.sourceMaps();

    mix.webpackConfig({
        output: {
            filename: `[name].[contenthash:${HASH_LENGTH}].js`,
            chunkFilename: `[name].[contenthash:${HASH_LENGTH}].js`,
        },
    });

    mix.override((config) => {
        config.plugins.forEach((plugin) => {
            if (plugin.constructor.name === 'MiniCssExtractPlugin') {
                plugin.options.filename = `[name].[contenthash:${HASH_LENGTH}].css`;
                plugin.options.chunkFilename = `[name].[contenthash:${HASH_LENGTH}].css`;
            }
        });
    });

    mix.then(() => {
        const manifestPath = path.resolve(__dirname, 'build/mix-manifest.json');
        if (!fs.existsSync(manifestPath)) return;

        const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
        const cleaned = {};

        for (const [key, value] of Object.entries(manifest)) {
            const cleanKey = key
                .replace(/\.[a-f0-9]+\.(js|css)(\.map)?$/, '.$1$2')
                .replace(/\/js\/app/, '/js/app')
                .replace(/\/css\/app/, '/css/app');

            const normalizedKey = cleanKey.startsWith('/') ? cleanKey : '/' + cleanKey;
            const normalizedValue = value.startsWith('/') ? value : '/' + value;
            cleaned[normalizedKey] = normalizedValue;
        }

        fs.writeFileSync(manifestPath, JSON.stringify(cleaned, null, 4) + '\n');
    });
}
