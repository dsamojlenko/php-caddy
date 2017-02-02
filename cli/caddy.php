#!/usr/bin/env php
<?php

use Silly\Edition\PhpDi\Application;

$version = '1.1';

$app = new Application('PHP Caddy', $version);

$app->command('start', 'Caddy\Command\StartCommand')->descriptions('Start up the Cadddy services');
$app->command('stop', 'Caddy\Command\StopCommand')->descriptions('Stop the Caddy services');

/**
 * Determine which Valet driver the current directory is using.
 */
$app->command('which', function () {
    require __DIR__.'/drivers/require.php';
    $driver = ValetDriver::assign(getcwd(), basename(getcwd()), '/');
    if ($driver) {
        info('This site is served by ['.get_class($driver).'].');
    } else {
        warning('Valet could not determine which driver to use for this site.');
    }
})->descriptions('Determine which Valet driver serves the current working directory');

$app->run();