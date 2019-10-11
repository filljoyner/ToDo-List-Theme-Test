let mix = require('laravel-mix');

const proxy_url = 'devshadow-todo.dv';
const dist_dir = './../../assets';

// call mix to start chaining
mix

/**
 * -----------------------------------
 * Config
 * -----------------------------------
 */
// the current directory
    .setResourceRoot('./')

    // configure path to theme assets (css, img, js dirs)
    .setPublicPath(dist_dir)

    // turn off preprocessing, it's gross. use relative paths
    .options({
        processCssUrls: false,
    })

    /**
     * -----------------------------------
     * Styles
     * -----------------------------------
     */
    // pipe sass to site.css
    .sass('styles/site.scss', 'css/site.css')

    /**
     * -----------------------------------
     * Images
     * -----------------------------------
     */
    // copy img directory
    .copyDirectory('img', `${dist_dir}/img`)


    /**
     * -----------------------------------
     * Javascript
     * -----------------------------------
     */
    // pipe site.js
    .js('js/site.js', 'js/site.js')

    // copy bootstrap to resources/assets/js/vendor
    .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', `js/vendor/bootstrap.min.js`)

    // copy vendor directory
    .copyDirectory('js/vendor', `${dist_dir}/js/vendor`)


    /**
     * -----------------------------------
     * Browser Sync for live reloading
     * -----------------------------------
     */
    .browserSync({
        proxy: proxy_url,
        files: [                // files to watch
            `${dist_dir}/css/site.css`,
            `${dist_dir}/js/site.js`,
            '../../config/*.php',
            '../../*.php',
            '../../resources/views/*.php',
            '../../resources/views/**/*.php'
        ]
    });
