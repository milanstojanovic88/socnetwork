// var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
//
// elixir(function(mix) {
//     mix.sass('app.scss');
// });

var gulp = require('gulp');
var watch = require('gulp-watch');
var jshint = require('gulp-jshint');
var plumber = require('gulp-plumber');
var cleanCss = require('gulp-clean-css');
var uglyfly = require('gulp-uglyfly');
var sass = require('gulp-sass');
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');
var stylish = require('jshint-stylish');
var rename = require('gulp-rename');

gulp.task('jshint', function() {
    return gulp.src('resources/assets/js/*.js')
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('compress', ['jshint'], function() {
    gulp.src('resources/assets/js/*.js')
        .pipe(uglyfly({
            mangle: false
        }))
        // .pipe(rename({
        //     suffix: '.min',
        //     extname: '.js'
        // }))
        .pipe(gulp.dest('public/src/js'))
});

gulp.task('styles', function () {
    return gulp.src('resources/assets/sass/app.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('public/src/css'))
        .pipe(cleanCss())
        // .pipe(rename({
        //     suffix: '.min',
        //     extname: '.css'
        // }))
        .pipe(gulp.dest('public/src/css'))
});

var globs = [
    'css-min/**',
    'js-min/**',
    'images/**',
    'fonts/**',
    '*.html',
    '*.php'
];

// gulp.task('ftp', function () {
//     var conn = ftp.create({
//         host: 'durlanactest.comxa.com',
//         user: ' a5829335',
//         password: 'Strike12',
//         log: gutil.log
//     });
//
//     return gulp.src(globs, {base: '.', buffer: false})
//         .pipe(conn.newerOrDifferentSize('/public_html'))
//         .pipe(conn.dest('/public_html'));
// });

gulp.task('watch', function() {
    gulp.watch('resources/assets/js/**/*.js', ['compress']);
    gulp.watch('resources/assets/sass/**/*.scss', ['styles']);
});

gulp.task('default', ['watch']);
