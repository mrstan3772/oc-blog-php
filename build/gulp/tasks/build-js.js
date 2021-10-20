import gulp from "gulp";
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import rename from 'gulp-rename';
import uglify from 'gulp-uglify-es';

const ug = uglify.default

/* export const build_js = () => ({
    compile: function () {
        return gulp.src('../../public_html/assets/src/js/app.01ERHPZDG1M4VB2J6GR62KN832.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('../../public_html/dist/js'))
    },
}) */

export const build_js = () => ({
    compile: function () {
        return gulp.src('../../public_html/assets/src/js/*.js')
        .pipe(concat('app.01ERHPZDG1M4VB2J6GR62KN832.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('../../public_html/dist/js'))
    },
    
    compile_min: function () {
        return gulp.src('../../public_html/assets/src/js/*.js')
        .pipe(concat('app.01ERHPZDG1M4VB2J6GR62KN832.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(ug())
        .pipe(rename({extname: '.min.js'}))
        .pipe(gulp.dest('../../public_html/dist/js'))
    },

    concat_lib: function () {
        return gulp.src('../../public_html/assets/src/js/lib/**/*.js')
        .pipe(concat('all.01ERHS32GTDHB1RBSJ9BP95MC9.js'))
        .pipe(gulp.dest('../../public_html/dist/js/lib'))
    },

    concat_lib_min: function () {
        return gulp.src('../../public_html/assets/src/js/lib/**/*.js')
        .pipe(concat('all.01ERHS32GTDHB1RBSJ9BP95MC9.js'))
        .pipe(ug())
        .pipe(rename({extname: '.min.js'}))
        .pipe(gulp.dest('../../public_html/dist/js/lib'))
    },
})