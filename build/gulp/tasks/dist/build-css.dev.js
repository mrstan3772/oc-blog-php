'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.build_css = void 0;

var _fibers = _interopRequireDefault(require("fibers"));

var _gulp = _interopRequireDefault(require("gulp"));

var _gulpSass = _interopRequireDefault(require("gulp-sass"));

var _gulpSourcemaps = _interopRequireDefault(require("gulp-sourcemaps"));

var _gulpRename = _interopRequireDefault(require("gulp-rename"));

var _gulpAutoprefixer = _interopRequireDefault(require("gulp-autoprefixer"));

var _gulpConcat = _interopRequireDefault(require("gulp-concat"));

var _gulpUglifyEs = _interopRequireDefault(require("gulp-uglify-es"));

var _nodeSass = _interopRequireDefault(require("node-sass"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var ug = _gulpUglifyEs["default"]["default"];
var sass = (0, _gulpSass["default"])(_nodeSass["default"]);

var build_css = function build_css() {
  return {
    compile: function compile() {
      return _gulp["default"].src('../../Web/assets/src/css/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.css').pipe(_gulpSourcemaps["default"].init()).pipe(sass({
        fiber: _fibers["default"],
        outputStyle: 'expanded'
      }).on('error', sass.logError)).pipe((0, _gulpAutoprefixer["default"])()).pipe(_gulpSourcemaps["default"].write('./maps')).pipe(_gulp["default"].dest('../../Web/dist/css'));
    },
    compile_min: function compile_min() {
      return _gulp["default"].src('../../Web/assets/src/css/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.css').pipe(_gulpSourcemaps["default"].init()).pipe(sass({
        fiber: _fibers["default"],
        outputStyle: 'compressed'
      }).on('error', sass.logError)).pipe((0, _gulpAutoprefixer["default"])()).pipe(_gulpSourcemaps["default"].write('./maps')).pipe((0, _gulpRename["default"])({
        extname: '.min.css'
      })).pipe(_gulp["default"].dest('../../Web/dist/css'));
    },
    concat_lib: function concat_lib() {
      return _gulp["default"].src('../../Web/assets/src/css/lib/**/*.css').pipe((0, _gulpConcat["default"])('all.01ERHS32GTDHB1RBSJ9BP95MC9.css')).pipe(_gulp["default"].dest('../../Web/dist/css/lib'));
    },
    concat_lib_min: function concat_lib_min() {
      return _gulp["default"].src('../../Web/assets/src/css/lib/**/*.css').pipe((0, _gulpConcat["default"])('all.01ERHS32GTDHB1RBSJ9BP95MC9.css')).pipe(sass({
        fiber: _fibers["default"],
        outputStyle: 'compressed'
      }).on('error', sass.logError)).pipe((0, _gulpRename["default"])({
        extname: '.min.css'
      })).pipe(_gulp["default"].dest('../../Web/dist/css/lib'));
    }
  };
};

exports.build_css = build_css;