'use strict';

import Fiber from 'fibers';
import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';
import autoprefixer from 'gulp-autoprefixer';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify-es';

import nodeSass from 'node-sass';

const ug = uglify.default;
const sass = gulpSass(nodeSass);

export const build_css = () => ({
         compile : function () { 
            return gulp.src('../../Web/assets/src/css/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'expanded' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

         compile_min : function () { 
            return gulp.src('../../Web/assets/src/css/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'compressed' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(rename({extname: '.min.css'}))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

         compile_perso : function () { 
            return gulp.src('../../Web/assets/src/css/my.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'expanded' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

         compile_perso_min : function () { 
            return gulp.src('../../Web/assets/src/css/my.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'compressed' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(rename({extname: '.min.css'}))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

         compile_admin : function () { 
            return gulp.src('../../Web/assets/src/css/main.02EJNXGEKMD3NWBHKYF0TS7KJQ.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'expanded' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

         compile_admin_min : function () { 
            return gulp.src('../../Web/assets/src/css/main.02EJNXGEKMD3NWBHKYF0TS7KJQ.css')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'compressed' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(rename({extname: '.min.css'}))
                .pipe(gulp.dest('../../Web/dist/css'))
         },

        concat_lib: function () {
            return gulp.src('../../Web/assets/src/css/lib/**/*.css')
            .pipe(concat('all.01ERHS32GTDHB1RBSJ9BP95MC9.css'))
            .pipe(gulp.dest('../../Web/dist/css/lib'))
        },
    
        concat_lib_min: function () {
            return gulp.src('../../Web/assets/src/css/lib/**/*.css')
            .pipe(concat('all.01ERHS32GTDHB1RBSJ9BP95MC9.css'))
            .pipe(sass({ fiber: Fiber, outputStyle: 'compressed' }).on('error', sass.logError))
            .pipe(rename({extname: '.min.css'}))
            .pipe(gulp.dest('../../Web/dist/css/lib'))
        },
})