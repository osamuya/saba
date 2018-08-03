"use strict";

//require
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const autoprefixer = require("gulp-autoprefixer");
const browserSync = require("browser-sync");
const notify = require('gulp-notify');
const watch = require('gulp-watch');
const ejs = require('gulp-ejs');
const rename = require('gulp-rename');
const fs = require('fs');
const data = require('gulp-data');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const frontnote = require("gulp-frontnote");
const uglify = require('gulp-uglify');
const pump = require('pump');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');
const del  = require('del');

//path
const SRC = './src';
const HTDOCS = './';
const BASE_PATH = '/';
const DEST = `${HTDOCS}${BASE_PATH}`;


// css
gulp.task("sass", () => {
    return gulp.src(`${SRC}/assets/scss/**/*.scss`)
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sass())
        .pipe(autoprefixer({browsers: ['last 6 versions']}))
        .pipe(gulp.dest(`${DEST}assets/css/`))
});

gulp.task('css', gulp.series('sass'));


//styleguide
gulp.task("styleguide", () => {
    return gulp.src(`${SRC}/scss/**/*.scss`)
        .pipe(frontnote({
            out: DEST + './guide',
            css: [BASE_PATH + "assets/css/index.css", ,"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css","https://fonts.googleapis.com/earlyaccess/notosansjapanese.css",BASE_PATH +"assets/css/bootstrap.min.css"]
    }))
});


//js
gulp.task('browserify', function () {
  return browserify(`${SRC}/assets/js/main.js`)
    .transform(babelify, {presets: ['es2015']})
    .bundle()
    .on('error', function(err){
        console.log(err.message);
        console.log(err.stack);
    })
    .pipe(source('bundle.js'))
    .pipe(gulp.dest(`${DEST}assets/js/`));
});

gulp.task('js', gulp.parallel('browserify'));


//html
gulp.task("ejs", () => {
    return gulp.src(
        ["src/**/*.ejs",'!' + "src/**/_*.ejs"]
    )
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(data(function(file) {
            const conf = require(`./src/${BASE_PATH}/json/config.json`);
            const pages = require(`./src/${BASE_PATH}/json/pages.json`);

            if (file.path.length !== 0) {
                let path = file.path.split('¥').join('/');
                path = path.split('\\').join('/');
                const filename =path.match(/^.+\/src\/(.+)\.ejs$/)[1];
                var meta = {};
                if (pages[filename]) {
                  meta = pages[filename];
                } else {
                  meta = pages.default;
                }
            }
            return {
              meta: meta,
              conf: conf
            };
        }))
        .pipe(ejs())
        .pipe(rename({extname: '.html'}))
        .pipe(gulp.dest(`${HTDOCS}`))
});

gulp.task('html', gulp.series('ejs'));


// server
gulp.task('browser-sync', () => {
    browserSync({
        server: {
            proxy: "localhost:3000",
            baseDir: HTDOCS
        },
        startPath: `${BASE_PATH}`,
        ghostMode: false
    });
    watch([`${SRC}/assets/scss/**/*.scss`], gulp.series('sass', browserSync.reload));
    watch([`${SRC}/assets/js/**/*.js`], gulp.series('browserify', browserSync.reload));
    watch('./src/**/*.+(jpg|jpeg|png|gif|svg)', gulp.series('image', browserSync.reload));
    watch([
        `${SRC}/**/*.ejs`,
    ], gulp.series('ejs', browserSync.reload));

});

gulp.task('server', gulp.series('browser-sync'));


//js min
gulp.task('compress', function () {
    return pump([
        gulp.src(`${DEST}assets/js/bundle.js`),
        uglify(),
        gulp.dest(`${DEST}assets/js/`)
        ],
    );
});


//image min
gulp.task('imagemin', () => {
  return gulp
    .src('./src/**/*.+(jpg|jpeg|png|gif|svg)',{ base: './src/' })
    .pipe(plumber())
    .pipe(
      imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.svgo({optimizationLevel: 5}),
        pngquant({ speed: 1 })
      ])
    )
    .pipe(gulp.dest('./public/'))
})

//image
gulp.task('image', () => {
  return gulp
    .src('./src/**/*.+(jpg|jpeg|png|gif|svg)',{ base: './src/' })
    .pipe(plumber())
    .pipe(gulp.dest('./public/'))
})


//clean
gulp.task('clean', () => del([`${DEST}**/*.+(jpg|jpeg|png|gif|svg)`,`${DEST}**/*.html` ]))


// default
gulp.task('dev', gulp.parallel('css', 'js', 'html'));
gulp.task('build', gulp.series('clean', 'dev', 'compress', 'imagemin'));
gulp.task('default', gulp.series('dev','server'));
