var gulp     = require('gulp'),
    path     = require('path'),
    concat   = require('gulp-concat'),
    cache    = require('gulp-cached'),
    stylecow = require('gulp-stylecow'),
    imagemin = require('gulp-imagemin'),
    rename   = require('gulp-rename'),
    sync     = require('browser-sync').create(),
    webpack  = require('webpack'),
    url      = require('url'),
    favicon  = require('gulp-real-favicon'),
    env      = process.env;

var publicPath = url.parse(env.APP_URL || '/enMarea/public').pathname;

gulp.task('apache', function () {
    gulp.src([
        'assets/.htaccess',
        'bower_components/apache-server-configs/dist/.htaccess',
    ])
    .pipe(concat('.htaccess'))
    .pipe(gulp.dest('public'))
});

gulp.task('css', function() {
    var config = require('./stylecow.json');

    if (env.APP_DEV) {
        config.code = 'normal';
        config.cssErrors = true;
    } else {
        config.code = 'minify';
    }

    stylecow
        .src(config.files)
        .forEach(function (file) {
            gulp
                .src(file.input)
                .pipe(stylecow(config))
                .pipe(rename(file.output))
                .pipe(gulp.dest(''));
        });
});

gulp.task('js', function(done) {
    var config = require('./webpack.config');

    if (!env.APP_DEV) {
        config.plugins = config.plugins.concat(
            new webpack.optimize.DedupePlugin(),
            new webpack.optimize.UglifyJsPlugin()
        );
    }

    config.output.publicPath = path.join(publicPath, '/js/');

    webpack(config, function (err, stats) {
        done();
    });
});

gulp.task('img', function(done) {
    gulp.src('assets/img/**/*.{jpg,png,gif,svg}')
        .pipe(cache('img'))
        .pipe(imagemin().on('end', done))
        .pipe(gulp.dest('public/img'));
});

gulp.task('fonts', function() {
    gulp.src('assets/fonts/*')
        .pipe(rename(function (path) {
            path.basename = path.basename.toLowerCase();
            return path;
        }))
        .pipe(gulp.dest('public/fonts'));
});

gulp.task('favicon', function(done) {
    favicon.generateFavicon({
        masterPicture: 'assets/img/logo-rrss.png',
        dest: 'public',
        iconsPath: publicPath,
        design: {
            ios: {
                pictureAspect: 'backgroundAndMargin',
                backgroundColor: '#004efe',
                margin: '14%',
                assets: {
                    ios6AndPriorIcons: false,
                    ios7AndLaterIcons: false,
                    precomposedIcons: false,
                    declareOnlyDefaultIcon: true
                }
            },
            desktopBrowser: {},
            windows: {
                pictureAspect: 'noChange',
                backgroundColor: '#da532c',
                onConflict: 'override',
                assets: {
                    windows80Ie10Tile: false,
                    windows10Ie11EdgeTiles: {
                        small: false,
                        medium: true,
                        big: false,
                        rectangle: false
                    }
                }
            },
            androidChrome: {
                pictureAspect: 'shadow',
                themeColor: '#ffffff',
                manifest: {
                    name: 'En marea',
                    display: 'standalone',
                    orientation: 'notSet',
                    onConflict: 'override',
                    declared: true
                },
                assets: {
                    legacyIcon: false,
                    lowResolutionIcons: false
                }
            },
            safariPinnedTab: {
                pictureAspect: 'blackAndWhite',
                threshold: 92.8125,
                themeColor: '#5bbad5'
            }
        },
        settings: {
            scalingAlgorithm: 'Mitchell',
            errorOnImageTooSmall: false
        },
        markupFile: 'faviconData.json'
    }, function() {
        done();
    });
});

gulp.task('sync', ['css', 'js', 'img', 'fonts'], function () {
    gulp.watch('assets/**/*.js', ['js']);
    gulp.watch('assets/**/*.css', ['css']);
    gulp.watch('assets/**/*.{jpg,png,gif,svg}', ['img']);
    gulp.watch([
        'app/**/*',
        'templates/**/*'
    ], function (event) {
        sync.reload();
    });
    gulp.watch('public/**/*', function (event) {
        sync.reload(path.basename(event.path));
    });

    sync.init({
        proxy: process.env.APP_URL,
        open: process.env.APP_SYNC_OPEN ? true : false
    });
});

gulp.task('default', ['css', 'js', 'img', 'apache', 'fonts']);
