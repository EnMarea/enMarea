<?php

require 'recipe/composer.php';

server('prod', '82.98.177.41', 22)
    ->user('enmarea')
    ->forwardAgent()
    ->stage('prod')
    ->env('branch', 'master')
    ->env('deploy_path', '/var/www/enmarea.gal/www');

set('repository', 'git@github.com:oscarotero/enMarea.git');
set('shared_files', ['.env']);
set('shared_dirs', [
    'data/logs',
    'data/uploads',
]);

task('deploy:assets', function () {
    $releasePath = env('release_path');

    run("php {$releasePath}/vendor/bin/phinx migrate -c {$releasePath}/phinx.php");
    runLocally('node node_modules/.bin/gulp');

    $uploads = array_merge(
        [
            'www/.htaccess',
            'www/css',
            'www/img',
            'www/fonts',
            'www/js',
        ],
        glob('www/*.png'),
        glob('www/*.ico'),
        glob('www/*.svg'),
        glob('www/*.json'),
        glob('www/*.xml')
    );

    foreach ($uploads as $path) {
        upload(__DIR__.'/'.$path, $releasePath.'/'.$path);
    }
});

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:writable',
    'deploy:shared',
    'deploy:assets',
    'deploy:symlink',
    'cleanup',
]);
