var autoprefixer = require('autoprefixer');
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var postcss = require('gulp-postcss');

gulp.task('css', function(){
  return gulp.src('frontend/assets/stylesheets/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(({outputStyle: 'compressed'})).on('error', sass.logError))
    .pipe(postcss([
      autoprefixer()
    ]))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('frontend/web/css/'))
});

gulp.task('watch', function () {
  gulp.watch('frontend/assets/stylesheets/*.scss', ['css']);
});

gulp.task('js', function(){
  return gulp.src('client/javascript/*.js')
    .pipe(sourcemaps.init())
    .pipe(concat('app.min.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('build/js'))
});

gulp.task('default', [ 'css', 'js' ]);