// CSS Gulp Files
// const {src, dest} = require("gulp");
// const minifyCss = require("gulp-clean-css");

// const bundleCss = () => {
//     return src("./src/css/**/*.css")
//         .pipe(minifyCss())
//         .pipe(dest("./dist/css"));
// }

// exports.bundleCss = bundleCss;


// JS Gulp Files
// const {src, dest} = require("gulp");
// const minifyJs = require("gulp-uglify");

// const bundleJs = () => {
//     return src("./src/js/**/*.js")
//         .pipe(minifyJs())
//         .pipe(dest("./dist/js"));
// }

// exports.bundleJs = bundleJs;





/**
 * This code for minify and bundled a javascript files
 */
// const gulp = require('gulp');
// const sourcemaps = require('gulp-sourcemaps');
// const concat = require('gulp-concat');
// const uglify = require('gulp-uglify');

// // Paths to your source and destination folders
// const paths = {
//   scripts: {
//     src: [
//         'assets/js/jquery.min.js',   // Adjust these paths and order as needed
//         'assets/js/popper.min.js',
//         'assets/js/bootstrap.js',
//         'assets/js/navigation.js',
//         'assets/js/owl-carousel.2.3.0.min.js',
//         'assets/js/anime.min.js',
//         'assets/js/main.js',
//         'assets/js/ajax-scripts.js',
//     ],  // Adjust this to your source JavaScript files
//     dest: 'assets/js/dist'         // Adjust this to your destination folder
//   }
// };

// // JavaScript processing task
// function scripts() {
//   return gulp.src(paths.scripts.src)
//     .pipe(sourcemaps.init())
//     .pipe(concat('ct-scripts.min.js'))
//     .pipe(uglify())
//     .pipe(sourcemaps.write('.'))
//     .pipe(gulp.dest(paths.scripts.dest));
// }

// // Watch task to automatically run the scripts task when files change
// function watch() {
//   gulp.watch(paths.scripts.src, scripts);
// }

// // Define the default task
// const build = gulp.series(scripts, watch);

// // Export tasks to the Gulp CLI
// exports.scripts = scripts;
// exports.watch = watch;
// exports.default = build;




/**
 * This code for clean css and minify css files
 */
const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const injectString = require('gulp-inject-string');
const fs = require('fs');

// // Paths to CSS files and output directory
// // Thrid Party Libraries
// const paths = {
//     css: [
//           'assets/css/bootstrap.min.css',   // Adjust these paths and order as needed
//           'assets/css/animate.css',
//           'assets/css/owlcarousel.min.css',
//       ], // Adjust this to your source CSS files' location
//     dist: 'assets/css/dist', // Adjust this to your output directory
//     file_name: 'ct-libraries.min.css'
// };

// // Theme Styles
// const paths = {
//     css: [
//             'assets/css/navigation.css',
//             'assets/css/style.css',
//             'assets/css/responsive.css',
//         ],
//     dist: 'assets/css/dist',
//     file_name: 'ct-theme-styles.min.css'
// };

// // Task to minify and bundle CSS
// gulp.task('minify-css', function() {
//   return gulp.src(paths.css)
//     .pipe(sourcemaps.init())
//     .pipe(concat(paths.file_name))
//     .pipe(cleanCSS({compatibility: 'ie8'}))
//     .pipe(sourcemaps.write('.'))
//     .pipe(gulp.dest(paths.dist));
// });

// // Task to watch for changes
// gulp.task('watch', function() {
//   gulp.watch(paths.css, gulp.series('minify-css'));
// });

// // Default task
// gulp.task('default', gulp.series('minify-css', 'watch'));



/** Seperate File GUlp Scripts */
// Paths configuration
const paths = {
  css: 'assets/css/pages-styles/**/*.css',              // Path to all CSS files
  excludeFile: 'assets/css/pages-styles/common-styles.css',   // The CSS file to exclude from the fetch
  dest: 'assets/css/dist',                    // Destination directory for minified files
};

// Task to append the content of the excluded CSS file, minify, and save the files
function processCss() {
  // Read the content of the excluded CSS file
  const excludeCssContent = fs.readFileSync(paths.excludeFile, 'utf8');

  return gulp.src([paths.css, `!${paths.excludeFile}`]) // Fetch all CSS files except the exclude file
      .pipe(injectString.prepend(excludeCssContent))    // Prepend the content of the exclude file to each file
      .pipe(cleanCSS({ compatibility: 'ie8' }))         // Minify the files
      .pipe(rename({ suffix: '.min' }))                 // Add .min suffix to the files
      .pipe(gulp.dest(paths.dest));                     // Save the minified files to the destination folder
}

// Watch task to automatically run on file changes
function watchFiles() {
  gulp.watch(paths.css, processCss);
}

// Define Gulp tasks
exports.process = processCss;
exports.watch = gulp.series(processCss, watchFiles);
exports.default = gulp.series(processCss);