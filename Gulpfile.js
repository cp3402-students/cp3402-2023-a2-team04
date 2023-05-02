'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

function buildStyles() {
    return gulp.src('./wp-content/themes/heartlandhits/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./wp-content/themes/heartlandhits/css'));
}

exports.buildStyles = buildStyles;
exports.watch = function () {
    gulp.watch('./wp-content/themes/heartlandhits/sass/**/*.scss', gulp.series(['buildStyles']));
};