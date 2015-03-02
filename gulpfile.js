'use strict';
 
/***** System Dependencies
 * Node JS  http://nodejs.org/download/
 * Ruby  https://ruby-lang.org/en/downloads/
 * Compass  http://compass-style.org/install/
 *****/
 
/** Node Modules
 * @variables
 */
var gulp = require('gulp'),
	compass = require('gulp-compass'),
	minifycss = require('gulp-minify-css'),
	autoprefixer = require('gulp-autoprefixer'),
	imagemin = require('gulp-imagemin'),
	jpegtran = require('imagemin-jpegtran'),
	pngcrush = require('imagemin-pngcrush'),
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
		.pipe(compass({
			config_file: './config.rb',
			css: './',
			sass: './src/scss'
		}))
		.on('error', function(err) {
			console.log(err.message);
		})
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

gulp.task('img', function() {
	gulp.src('./src/img/**')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [jpegtran(), pngcrush()]
		}))
		.pipe(gulp.dest('./img'));
});

gulp.task('watch', function() {
	// Watch for SASS Changes
	gulp.watch('./src/scss/**/*.scss', ['css']);
	// Watch for JavaScript Changes
	gulp.watch('./src/js/**/*.js', ['js']);
	// Watch for php file changes
	gulp.watch('./*.php', ['php']);
});

gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'aleksblago.dev'
	});
});

gulp.task('default', function() {
	// gulp.start('css','js','img','connect','open','watch');
	gulp.start('watch','browser-sync');
});