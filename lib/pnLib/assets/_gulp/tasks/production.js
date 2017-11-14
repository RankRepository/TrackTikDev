var gulp = require('gulp');

// Run this to compress all the things!
gulp.task('prod', ['iconFont'], function() {
  gulp.start(['minifyCss', 'uglifyJs']);
});
