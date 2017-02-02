<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\HiddenConsole;
use Caddy\Output;
use Caddy\Filesystem;
use Caddy\Mailhog;

class InstallCommand
{
    public function __invoke(Filesystem $files, Caddy $caddy, Mailhog $mailhog, HiddenConsole $hiddenConsole)
    {
        Output::info('Installing PHP Caddy...');

        $files->ensureDirExists(CADDY_HOME_PATH);
        $files->ensureDirExists(CADDY_BIN_PATH);

        $caddy->install();
        $mailhog->install();
        $hiddenConsole->install();
    }
}