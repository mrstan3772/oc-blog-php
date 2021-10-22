import gulp from 'gulp';
import {opti} from './tasks/optimizing-img.js';
import {build_css} from './tasks/build-css.js';
import {build_js} from './tasks/build-js.js';

gulp.task('watch', () => {
    gulp.watch('../../Web/assets/src/images/any/*', opti().any_section)
    gulp.watch('../../Web/assets/src/images/home/*', opti().home_section)
    gulp.watch('../../Web/assets/src/images/about/*', opti().about_section)
    gulp.watch('../../Web/assets/src/images/services/*', opti().festival_section)
    gulp.watch('../../Web/assets/src/images/work/*', opti().movie_section)
    gulp.watch('../../Web/assets/src/images/contact/*', opti().news_section)
    gulp.watch('../../Web/assets/src/images/admin/*', opti().reservation_section)
    gulp.watch('../../Web/assets/src/css/*.css', gulp.series(build_css().compile, build_css().compile_min))
    gulp.watch('../../Web/assets/src/css/lib/**/*.css', gulp.series(build_css().concat_lib, build_css().concat_lib_min))
    gulp.watch('../../Web/assets/src/js/*.js', gulp.series(build_js().compile, build_js().compile_min))
    gulp.watch('../../Web/assets/src/js/lib/**/*.js', gulp.series(build_js().concat_lib, build_js().concat_lib_min))
})

gulp.task('default', gulp.series('watch'))