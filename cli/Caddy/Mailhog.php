<?php namespace Caddy;

class Mailhog
{
    function start()
    {
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\mailhog.exe');
    }

    function stop()
    {
        exec('taskkill /im mailhog.exe /f >nul 2>&1');
    }
}