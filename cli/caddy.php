#!/usr/bin/env php
<?php

use Silly\Edition\PhpDi\Application;

$version = '1.1';

$app = new Application('PHP Caddy', $version);

$app->command('start', 'Caddy\Command\StartCommand')
    ->descriptions('Start up the Cadddy services');

$app->command('stop', 'Caddy\Command\StopCommand')
    ->descriptions('Stop the Caddy services');

$app->command('which', 'Caddy\Command\WhichCommand')
    ->descriptions('Determine which Valet driver serves the current working directory');

$app->run();