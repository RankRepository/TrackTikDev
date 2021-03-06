var gulp     = require('gulp');
var config   = require('../../config').iconFonts;
var swig     = require('gulp-swig');
var rename   = require('gulp-rename');

module.exports = function(glyphs, options) {
  gulp.src(config.template)
    .pipe(swig({
      data: {
        icons: glyphs.map(function(icon) {
          return {
            name: icon.name,
            code: icon.unicode[0].charCodeAt(0).toString(16)
          };
        }),

        fontName: config.options.fontName,
        fontPath: config.fontPath,
        className: config.className,
        cacheBreaker: Math.round(Date.now()/1000),
        comment: 'DO NOT EDIT DIRECTLY!\n *  Generated by _gulp/tasks/iconFont.js\n *  from ' + config.template
      }
    }))
    .pipe(rename(config.sassOutputName))
    .pipe(gulp.dest(config.sassDest));
};
