<?php

/* (c) Alexey Rogachev <arogachev90@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/common.php';

/**
 * Yii 2 Basic Project Template configuration
 */

// Yii 2 Basic Project Template shared dirs
set('shared_dirs', ['runtime']);

/**
 * Run migrations
 */
task('deploy:run_migrations', function () {
    run('php {{release_path}}/yii migrate up --interactive=0');
})->desc('Run migrations');

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:run_migrations',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');

after('deploy', 'success');
