<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Mailhog;
use Caddy\PhpCgi;
use Symfony\Component\Console\Output\OutputInterface;

class UpCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php, OutputInterface $output)
    {
        info('Caddying up...');

        $php->restart();
        $caddy->restart();
        $mailhog->restart();

        info('Caddy services have been started.');
        info('You may access your site at http://localhost');
        info('You may access mailhog at http://localhost:8025');
    }
}