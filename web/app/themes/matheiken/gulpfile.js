var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
// var browserSync = require('browser-sync');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var paths = {
    scripts: ['js/scripts/*.js'],
    styles: ['sass/**/*.scss'],
}

// gulp.task('browserSync', function() {
//     browserSync.init({ server: { baseDir: "./app" } });
// });

gulp.task('scripts', function() {
    return gulp.src(paths.scripts)
        .pipe(uglify())
        .pipe(concat('bundle.min.js'))
        .pipe(gulp.dest('./js'));
});

gulp.task('sass', function () {
    return gulp.src(paths.styles)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('.'));
        // .pipe(browserSync.stream());
 });

gulp.task('default', ['watch']);

gulp.task('watch', ['sass', 'scripts'], function(){
    // browserSync.init({ server: { baseDir: "./app" } });

    gulp.watch(paths.styles, ['sass']);
    gulp.watch(paths.scripts, ['scripts']);
});