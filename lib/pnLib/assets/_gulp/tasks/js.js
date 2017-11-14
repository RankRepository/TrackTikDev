var gulp         = require('gulp');
//var browserSync  = require('browser-sync');
var sourcemaps   = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').js;

// Concats JS files
gulp.task('js', function () {
  return gulp.src(config.src)
    .pipe(sourcemaps.init())
    .pipe(concat(config.srcFileName))
    .pipe(sourcemaps.write('../maps'))
    .on('error', handleErrors)
    .pipe(gulp.dest(config.dest));
    //.pipe(browserSync.stream());
});