var gulp         = require('gulp');
var sourcemaps   = require('gulp-sourcemaps');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').fontsCopy;

// Copy JS files without concatenation
gulp.task('fontsCopy', function () {
  return gulp.src(config.src)
    .pipe(sourcemaps.init())
    .on('error', handleErrors)
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.dest));
});