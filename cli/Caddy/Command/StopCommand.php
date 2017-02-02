<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Mailhog;
use Caddy\PhpCgi;

class StopCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php)
    {
        info('Caddying down...');

        $caddy->stop();
        $php->stop();
        $mailhog->stop();

        info('Caddy services have been stopped');
    }

}