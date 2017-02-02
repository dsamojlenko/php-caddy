<?php namespace Caddy\Command;

use ValetDriver;

class WhichCommand
{
    public function __invoke()
    {
        $driver = ValetDriver::assign(getcwd(), basename(getcwd()), '/');
        if ($driver) {
            info('This site is served by ['.get_class($driver).'].');
        } else {
            warning('Valet could not determine which driver to use for this site.');
        }
    }
}