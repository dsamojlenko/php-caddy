<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Filesystem;
use Caddy\Mailhog;
use Caddy\PhpCgi;

class UpCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php, Filesystem $files)
    {
        info('Caddying up...');

        $files->createSiteLink(getcwd());

        $php->restart();
        $caddy->restart();
        $mailhog->restart();

        info('Caddy services have been started.');
        info('You may access your site at http://localhost');
        info('You may access mailhog at http://localhost:8025');
    }
}