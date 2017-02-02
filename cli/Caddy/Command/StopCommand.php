<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Output;
use Caddy\Mailhog;
use Caddy\PhpCgi;

class StopCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php)
    {
        Output::info('Caddying down...');

        $caddy->stop();
        $php->stop();
        $mailhog->stop();

        Output::info('Caddy services have been stopped');
    }

}