#!/usr/bin/env php
<?php

/**
 * Load correct autoloader depending on install location.
 */
if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    require __DIR__.'/../vendor/autoload.php';
} else {
    require __DIR__.'/../../../autoload.php';
}

use Silly\Application;
use Illuminate\Container\Container;

Container::setInstance(new Container);

$version = '0.1';

$app = new Application('GCSX Caddy', $version);

$app->command('up', function() {
    info('Caddying up...');
    PhpCgi::start();
    Mailhog::start();
    Caddy::start();

    info('We make Success!');
    info('You may access your site at http://localhost');
    info('You may access mailhog at http://localhost:8025');
})->descriptions('Start it up!');

$app->command('down', function() {
    info('Caddying down...');
    Caddy::stop();
    PhpCgi::stop();
    Mailhog::stop();
})->descriptions('Shut it down!');

$app->run();