<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\HiddenConsole;
use Caddy\Output;
use Caddy\Mailhog;
use Caddy\PhpCgi;
use Caddy\Site;
use Symfony\Component\Console\Input\InputInterface;

class StartCommand
{
    public function __invoke(InputInterface $input, Caddy $caddy, Mailhog $mailhog, PhpCgi $php, HiddenConsole $hiddenConsole, Site $site)
    {
        Output::info('Starting services...');

        $withoutMailhog = $input->getOption('without-mailhog');

        // link current directory
        $site->link(getcwd());
        Output::info('Linked Caddy to current directory: ' . getcwd());

        // make sure hiddenConsole is installed otherwise nothing else works
        if (!$hiddenConsole->installed()) {
            Output::warning('Some caddy services seem to be missing.  Try installing');
            exit;
        }

        // start php and caddy first
        if ($php->start() && $caddy->start()) {
            Output::info('Caddy services have been started.');
            Output::info('You may access your site at http://localhost');

            // start mailhog unless specifically excluded
            if (!$withoutMailhog) {
                if ($mailhog->start()) {
                    Output::info('You may access mailhog at http://localhost:8025');
                    Output::info('SMTP service is available at 127.0.0.1:1025');
                }
            }
            return;
        }

        Output::warning('One or more services could not be started and PHP Caddy may not work correctly, see errors above.');
    }
}