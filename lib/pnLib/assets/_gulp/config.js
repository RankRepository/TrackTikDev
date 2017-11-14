var dest = "./dist",
    gulpBasePath = "./_gulp",
    src = './src',
    nodeModules = '/node_modules';

module.exports = {
    sass: {
        src: src + '/css/admin.scss',
        watch: src + '/css/**/*.scss',
        srcFonts: src + '/css/shared/fonts.scss', // Fonts css apart in case we need it with a webfont loader
        dest: dest + "/css/",
        autoPrefixerBrowsers: 'last 3 versions', // https://github.com/postcss/autoprefixer#options
        settings: {
            indentedSyntax: false, // Enable .sass syntax!
            includePaths: [
              './node_modules/normalize.css',
              './node_modules/bootstrap-sass/assets/stylesheets/'
            ],
            imagePath: 'images' // Used by the image-url helper
        }
    },
    js: {
        src: [
            src + '/js/utils/**/*.js',
            src + '/js/components/**/*.js',

            // vendors
            src + '/js/plugins/**/*.js',

            // core
            src + '/js/admin.js'
        ],
        watch: src + '/js/**/*.js',
        srcFileName: 'admin.js',
        dest: dest + '/js/',
    },
    jsCopy: {
        src: [
        ],
        dest: dest + '/js/vendors'
    },
    iconFonts: {
        name: 'icons',
        src: src + '/icons/*.svg',
        dest: dest + '/fonts/icons',
        sassDest: src + '/css',
        template: gulpBasePath + '/tasks/iconFont/template.scss.swig',
        sassOutputName: 'shared/icons.scss',
        fontPath: '/fonts/icons',
        className: 'icon',
        options: {
            fontName: 'icons',
            formats: ['ttf', 'eot', 'woff', 'woff2'],
            appendUnicode: true, // recommended option
            timestamp: Math.round(Date.now()/1000), // recommended to get consistent builds when watching files
        }
    },
    fontsCopy: {
        src: [
            './node_modules/bootstrap-sass/assets/fonts/**'
        ],
        dest: dest + '/fonts'
    },
    production: {
        cssSrc: dest + '/css/**/*.css',
        cssDest: dest + '/css',
        jsSrc: dest + '/js/**/*.js',
        jsDest: dest + '/js'
    }
};
