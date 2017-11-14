var gulp             = require('gulp');
    gutil            = require('gulp-util');
    iconfont         = require('gulp-iconfont'),
    argv             = require('yargs').argv,
    config           = require('../../config').iconFonts,
    generateIconSass = require('./generateIconSass');

gulp.task('iconFont', function() {
    if (argv.icon) {
        return gulp.src(config.src)
            .pipe(iconfont(config.options))
            .on('glyphs', generateIconSass)
            .pipe(gulp.dest(config.dest));
    } else {
        gutil.log('Notice: iconFont not generated, use --icon flag to build');
        return true;
    }
});