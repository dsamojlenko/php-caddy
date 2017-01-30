<?php namespace Caddy;

class Caddy
{
    function start()
    {
        $caddypath = VALET_BIN_PATH . '\\..\\';
        $public_path = realpath(getcwd()) . '\public';

        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\caddy.exe -conf ' . $caddypath . '\Caddyfile -root ' . $public_path);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}