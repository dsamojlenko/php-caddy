#!/usr/bin/env php
<?php

use Silly\Application;
use Illuminate\Container\Container;

Container::setInstance(new Container);

$version = '0.3';

$app = new Application('GCSX Caddy', $version);

$app->command('up', function() {
    info('Caddying up...');
    PhpCgi::restart();
    Mailhog::restart();
    Caddy::restart();

    info('Caddy services have been started.');
    info('You may access your site at http://localhost');
    info('You may access mailhog at http://localhost:8025');
})->descriptions('Start up the Caddy services');

$app->command('down', function() {
    info('Caddying down...');
    Caddy::stop();
    PhpCgi::stop();
    Mailhog::stop();
    info('Caddy services have been stopped');
})->descriptions('Tear down the Caddy services.');

$app->run();