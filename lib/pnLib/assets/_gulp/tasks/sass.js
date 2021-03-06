var gulp         = require('gulp');
//var browserSync  = require('browser-sync');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').sass;
var autoprefixer = require('gulp-autoprefixer');

// Main sass files
gulp.task('sass-main', function () {
  return gulp.src(config.src)
    .pipe(sourcemaps.init())
    .pipe(sass(config.settings))
    .on('error', handleErrors)
    .pipe(autoprefixer({
        browsers: [config.autoPrefixerBrowsers]
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.dest));
    //.pipe(browserSync.stream());
});

// Fonts sass files
gulp.task('sass-fonts', function () {
  return gulp.src(config.srcFonts)
    .pipe(sourcemaps.init())
    .pipe(sass(config.settings))
    .on('error', handleErrors)
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.dest));
});

gulp.task('sass', ['sass-main', 'sass-fonts']);