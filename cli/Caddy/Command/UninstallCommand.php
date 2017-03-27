<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Filesystem;
use Caddy\HiddenConsole;
use Caddy\Mailhog;
use Caddy\Output;
use Caddy\PhpCgi;

class UninstallCommand
{
    public function __invoke(Filesystem $files, Caddy $caddy, Mailhog $mailhog, PhpCgi $php, HiddenConsole $hiddenConsole)
    {
        Output::info('Removing PHP Caddy...');

        $files->ensureDirExists(CADDY_HOME_PATH);
        $files->ensureDirExists(CADDY_BIN_PATH);

        $php->stop();
        $caddy->uninstall();
        $mailhog->uninstall();
        $hiddenConsole->uninstall();

        $files->unlink(CADDY_HOME_PATH);
    }
}