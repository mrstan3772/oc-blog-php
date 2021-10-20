'use strict';

import Fiber from 'fibers';
import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';
import autoprefixer from 'gulp-autoprefixer';

import nodeSass from 'node-sass';

const sass = gulpSass(nodeSass);

export const build_css = () => ({
         compile : function () { 
            return gulp.src('../../public_html/assets/src/css/sass/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.scss')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'expanded' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('../../public_html/dist/css'))
         },

         compile_min : function () { 
            return gulp.src('../../public_html/assets/src/css/sass/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.scss')
                .pipe(sourcemaps.init())
                .pipe(sass({ fiber: Fiber, outputStyle: 'compressed' }).on('error', sass.logError))
                .pipe(autoprefixer())
                .pipe(sourcemaps.write('./maps'))
                .pipe(rename({extname: '.min.css'}))
                .pipe(gulp.dest('../../public_html/dist/css'))
         }
})