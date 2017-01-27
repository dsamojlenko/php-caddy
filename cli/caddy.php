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

    Caddy::up();
    //
});

$app->command('down', function() {
    Caddy::down();
});

$app->run();