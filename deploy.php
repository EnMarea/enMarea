<?php

require 'recipe/composer.php';

server('dev', 'oscarotero.com', 22)
    ->user('oscarotero')
    ->forwardAgent()
    ->stage('dev')
    ->env('branch', 'master')
    ->env('deploy_path', '/var/www/oscarotero.com/www/enMarea');

set('repository', 'git@github.com:oscarotero/enMarea.git');
set('writable_dirs', ['public']);
set('shared_files', ['.env']);
set('shared_dirs', ['data']);

task('deploy:assets', function () {
    $path = env('release_path');
    $uploads = [
        '/public/.htaccess',
        '/public/img',
        '/public/css',
        '/public/js',
    ];

    runLocally('node node_modules/.bin/gulp');

    foreach ($uploads as $dir) {
        upload(__DIR__.$dir, $path.$dir);
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
