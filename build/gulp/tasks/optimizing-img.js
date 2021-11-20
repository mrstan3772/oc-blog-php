//const gulp = require('gulp');
// const imagemin = require('gulp-imagemin');
import gulp from 'gulp';
import imagemin from 'gulp-imagemin';

const config = {
    params: [
        imagemin.gifsicle({ interlaced: true }),
        imagemin.mozjpeg({ quality: 75, progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
            plugins: [
                {
                    removeViewBox: true
                }
            ]
        })
    ],
    verbose: true,
}

export const opti = () => ({
    any_section: function () {
        return gulp.src('../../Web/assets/src/images/any/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/any'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    home_section: function () {
        return gulp.src('../../Web/assets/src/images/home/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/home'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    about_section: function () {
        return gulp.src('../../Web/assets/src/images/about/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/about'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    services_section: function () {
        return gulp.src('../../Web/assets/src/images/services/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/services'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    work_section: function () {
        return gulp.src('../../Web/assets/src/images/work/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/work'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    blog_section: function () {
        return gulp.src('../../Web/assets/src/images/blog/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/blog'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    admin_section: function () {
        return gulp.src('../../Web/assets/src/images/admin/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/admin'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    contact_section: function () {
        return gulp.src('../../Web/assets/src/images/contact/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/contact'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },
})

/* 
gulp.task('any_section', any_section)
gulp.task('home_section', home_section)
gulp.task('about_section', about_section)
gulp.task('services_section', services_section)
gulp.task('work_section', work_section)
gulp.task('blog_section', blog_section)
gulp.task('admin_section', admin_section)
gulp.task('contact_section', admin_section)
*/


// module.exports = () => gulp.task('default', gulp.series('any_section', 'home_section', 'about_section', 'services_section', 'work_section', 'blog_section', 'admin_section', 'watch', 'contact_section', 'watch'))
