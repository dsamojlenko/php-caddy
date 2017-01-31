<?php namespace Caddy;

class Mailhog
{
    function restart()
    {
        $this->stop();
        exec(BIN_PATH . '\RunHiddenConsole.exe ' . BIN_PATH . '\mailhog.exe');
    }

    function stop()
    {
        exec('taskkill /im mailhog.exe /f >nul 2>&1');
    }
}