<?php namespace Caddy;

class Mailhog
{
    function restart()
    {
        $this->stop();
        exec(CADDY_BIN_PATH . '\RunHiddenConsole.exe ' . CADDY_BIN_PATH . '\mailhog.exe');
    }

    function stop()
    {
        exec('taskkill /im mailhog.exe /f >nul 2>&1');
    }
}