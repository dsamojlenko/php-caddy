<?php namespace Caddy;

class Caddy
{
    function restart()
    {
        $public_path = realpath(getcwd()) . '\public';

        $this->stop();
        exec(BIN_PATH . '\RunHiddenConsole.exe ' . BIN_PATH . '\caddy.exe -conf ' . BASE_PATH . '\Caddyfile -root ' . $public_path);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}