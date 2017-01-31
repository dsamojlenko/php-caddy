#!/usr/bin/env php
<?php

use Silly\Edition\PhpDi\Application;

$version = '0.3';

$app = new Application('GCSX Caddy', $version);

$app->command('up', 'Caddy\Command\UpCommand')->descriptions('Start up the Cadddy services');
$app->command('down', 'Caddy\Command\DownCommand')->descriptions('Tear down the Caddy services');

$app->run();