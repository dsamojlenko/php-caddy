<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\HiddenConsole;
use Caddy\Output;
use Caddy\Mailhog;
use Caddy\PhpCgi;
use Caddy\Site;

class StartCommand
{
    public function __invoke(Caddy $caddy, Mailhog $mailhog, PhpCgi $php, HiddenConsole $hiddenConsole, Site $site)
    {
        Output::info('Caddying up...');

        $site->link(getcwd());

        if (!$hiddenConsole->installed()) {
            Output::warning('Some caddy services seem to be missing.  Try installing');
            exit;
        }

        if ($php->start() && $caddy->start() && $mailhog->start()) {
            Output::info('Caddy services have been started.');
            Output::info('You may access your site at http://localhost');
            Output::info('You may access mailhog at http://localhost:8025');
            return;
        }

        Output::warning('One or more services could not be started and PHP Caddy may not work correctly, see errors above.');
    }
}