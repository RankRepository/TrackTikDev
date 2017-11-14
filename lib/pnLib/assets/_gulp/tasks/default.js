var gulp = require('gulp');

gulp.task('default', ['iconFont', 'jsCopy', 'fontsCopy'], function() {
    gulp.start('sass', 'js', 'watch');
});