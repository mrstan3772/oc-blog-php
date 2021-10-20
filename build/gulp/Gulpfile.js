import gulp from 'gulp';
import {opti} from './tasks/optimizing-img.js';
import {build_css} from './tasks/build-css.js';
import {build_js} from './tasks/build-js.js';

gulp.task('watch', () => {
    gulp.watch('../../public_html/assets/src/images/any/*', opti().any_section)
    gulp.watch('../../public_html/assets/src/images/home/*', opti().home_section)
    gulp.watch('../../public_html/assets/src/images/about/*', opti().about_section)
    gulp.watch('../../public_html/assets/src/images/festival/*', opti().festival_section)
    gulp.watch('../../public_html/assets/src/images/movie/*', opti().movie_section)
    gulp.watch('../../public_html/assets/src/images/news/*', opti().news_section)
    gulp.watch('../../public_html/assets/src/images/reservation/*', opti().reservation_section)
    gulp.watch('../../public_html/assets/src/images/contact/*', opti().contact_section)
    gulp.watch('../../public_html/assets/src/css/sass/**/*.scss', gulp.series(build_css().compile, build_css().compile_min))
    gulp.watch('../../public_html/assets/src/js/*.js', gulp.series(build_js().compile, build_js().compile_min))
    gulp.watch('../../public_html/assets/src/js/lib/**/*.js', gulp.series(build_js().concat_lib, build_js().concat_lib_min))
})

gulp.task('default', gulp.series('watch'))