<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Output;
use Caddy\Mailhog;
use Caddy\PhpCgi;
use Caddy\Site;

class StartCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php, Site $site)
    {
        Output::info('Caddying up...');

        // check installation

        $site->link(getcwd());
        $php->restart();
        $caddy->restart();
        $mailhog->restart();

        Output::info('Caddy services have been started.');
        Output::info('You may access your site at http://localhost');
        Output::info('You may access mailhog at http://localhost:8025');
    }
}