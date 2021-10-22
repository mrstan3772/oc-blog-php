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

    festival_section: function () {
        return gulp.src('../../Web/assets/src/images/services/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/services'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    movie_section: function () {
        return gulp.src('../../Web/assets/src/images/work/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/work'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    news_section: function () {
        return gulp.src('../../Web/assets/src/images/blog/*')
            .pipe(imagemin())
            .pipe(gulp.dest('../../Web/dist/images/blog'))
            .pipe(imagemin(config.params, {
                verbose: config.verbose
            }))
    },

    reservation_section: function () {
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
gulp.task('festival_section', festival_section)
gulp.task('movie_section', movie_section)
gulp.task('news_section', news_section)
gulp.task('reservation_section', reservation_section)
gulp.task('contact_section', reservation_section)
*/


// module.exports = () => gulp.task('default', gulp.series('any_section', 'home_section', 'about_section', 'festival_section', 'movie_section', 'news_section', 'reservation_section', 'watch', 'contact_section', 'watch'))
