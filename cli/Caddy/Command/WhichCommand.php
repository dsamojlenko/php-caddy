<?php namespace Caddy\Command;

use Caddy\Output;
use ValetDriver;

class WhichCommand
{
    public function __invoke()
    {
        $driver = ValetDriver::assign(getcwd(), basename(getcwd()), '/');
        if ($driver) {
            Output::info('This site is served by ['.get_class($driver).'].');
        } else {
            Output::warning('Valet could not determine which driver to use for this site.');
        }
    }
}