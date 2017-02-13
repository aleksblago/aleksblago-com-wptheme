'use strict';
 
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	minifycss = require('gulp-minify-css'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	browserSync = require('browser-sync'),
	reload = browserSync.reload;
	
gulp.task('php', function () {
	gulp.src('./*.php')
		.pipe(reload({stream: true}));
});

gulp.task('css', function() {
	gulp.src('./src/scss/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(minifycss({ keepSpecialComments: true }))
		.pipe(gulp.dest('./'))
		.pipe(reload({stream: true}));
});

gulp.task('js', function() {
	gulp.src('./src/js/**/*.js')
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./js'))
		.pipe(reload({stream: true}));
});

gulp.task('watch', function() {
	gulp.watch('./src/scss/**/*.scss', ['css']);
	gulp.watch('./src/js/**/*.js', ['js']);
	gulp.watch('./*.php', ['php']);
});

gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'aleksblago.dev'
	});
	
	gulp.watch('./src/scss/**/*.scss', ['css']);
	gulp.watch('./src/js/**/*.js', ['js']);
	gulp.watch('./*.php', ['php']);
});

gulp.task('default', function() {
	gulp.start('css','js');
});