var gulp = require('gulp'),

	// Load plugins
	cache      = require('gulp-cached'),
	concat     = require('gulp-concat'),
	cssnext    = require('postcss-cssnext'),
	del        = require('del'),
	minifyCSS  = require('gulp-cssnano'),
	minifyHTML = require('gulp-htmlmin'),
	imagemin   = require('gulp-imagemin'),
	livereload = require('gulp-livereload'),
	postcss    = require('gulp-postcss'),
	rename     = require('gulp-rename'),
	svg2png    = require('gulp-svg2png'),
	svgmin     = require('gulp-svgmin'),
	svgSprite  = require('gulp-svg-sprite'),
	uglify     = require('gulp-uglify'),
	watch      = require('gulp-watch'),

	// Define paths. The order is important.
	paths = {
		css: [
			'./src/assets/css/settings/variables.css',
			'./src/node_modules/normalize-css/normalize.css',
			'./src/assets/css/settings/base.css',
			'./src/modules/**/**/*.css',
			'./src/modules/**/**/**/*.css',
			'./src/modules/**/**/**/**/*.css',
			'./src/assets/css/settings/fonts.css',
			'./src/assets/css/shame.css'
		],
		js: [
			'./src/assets/js/*.js',
			'./src/modules/**/**/*.js',
			'./src/modules/**/**/**/*.js'
		],
		nodejs: [
			'node_modules/html5shiv/dist/html5shiv.js'
		],
		svg: [
			'./src/modules/**/**/*.svg',
			'./src/modules/**/**/**/*.svg',
			'!./src/modules/graphics/icon/*.svg',
			'./src/assets/img/*.svg'
		],
		icons: [
			'./src/modules/graphics/icon/*.svg'
		],
		move: [
			'./src/humans.txt',
			// move in to directory....
			'./src/assets/fonts/*.*'
		],
		img: [
			'./src/modules/**/**/*.+(png|jpg)',
			'./src/modules/**/**/**/*.+(png|jpg)',
			'./tmp/assets/img/*.+(png|jpg)',
			'./src/assets/img/**/*.+(png|jpg)',
			'./src/assets/img/*.+(png|jpg)'
		]
	};

// CSS task
gulp.task('css', function () {
    var processors = [
        cssnext
    ];
    return gulp.src(paths.css)
				.pipe(concat('styles.css'))
        .pipe(postcss(processors))
				.pipe(minifyCSS())
        .pipe(gulp.dest('./dist/assets/css/'));
});

// SVG optimisation task
gulp.task('svgo', function() {
	return gulp.src(paths.svg)
		.pipe(cache('svgoptimising'))
		.pipe(svgmin())
		.pipe(rename({dirname: ""}))
		.pipe(gulp.dest('./dist/assets/img/'));
});

// SVG sprite
gulp.task('sprite', function () {
	return gulp.src(paths.icons)
		.pipe(svgSprite({
			mode : {
				symbol : {
					dest : ".",
          sprite : "symbols.svg"
				}
			}
		}))
		.pipe(gulp.dest("./dist/assets/img"))
});

// SVG to PNG task
gulp.task('svg2png', function() {
	return gulp.src(paths.svg)
		.pipe(cache('svgpnging'))
		.pipe(svg2png())
		.pipe(rename({dirname: ""}))
		.pipe(gulp.dest('tmp/assets/img/'));
});

// Bitmap minimisation task
// PNGs get converted into 8bit with pngquant
// JPEGs get made progressive & compressed
// Depends on svg2png
gulp.task('minimage', ["svg2png"], function() {
	return gulp.src(paths.img)
		.pipe(cache('minimising'))
		.pipe(imagemin({progressive: true, pngquant: true, optimizationLevel: 3 }))
		.pipe(rename({dirname: ""}))
		.pipe(gulp.dest('./dist/assets/img'))
});

// JS uglify
gulp.task('uglification', function() {
	return gulp.src(paths.js)
		.pipe(concat('app.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./dist/assets/js'))
});

// Copy & uglify standalone Node JS components to ./dist task
gulp.task('nodejs', function() {
	return gulp.src(paths.nodejs)
		.pipe(uglify())
		.pipe(gulp.dest('./dist/assets/js/'));
})

// Simple move task
gulp.task('move', function() {
	return gulp.src(paths.move)
		.pipe(gulp.dest('./dist/'));
});

// Watch task
gulp.task('watch', function() {
	gulp.watch(paths.css, ['css']);
	gulp.watch(paths.js, ['uglification']);
	gulp.watch(paths.svg, ['svg2png','svgo']);
	gulp.watch(paths.icon, ['sprite']);
	gulp.watch(paths.img, ['minimage']);
  livereload.listen();
});

// Clean task
gulp.task('clean', function(cb) {
	del(['./dist/assets/**/*'], cb);
});

// Default task
gulp.task('default', [
	'css',
	'sprite',
	'svgo',
	'svg2png',
	'minimage',
	'uglification',
	'move',
	'watch'
]);
