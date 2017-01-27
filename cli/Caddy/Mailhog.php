<?php namespace Caddy;

class Mailhog
{
    function start()
    {
        info('Starting mailhog');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\mailhog.exe');
    }

    function stop()
    {
        info('Kill the Mailhog');
        exec('taskkill /im mailhog.exe /f >nul 2>&1');
    }
}