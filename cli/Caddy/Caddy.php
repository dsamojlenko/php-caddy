<?php namespace Caddy;

class Caddy
{
    function start()
    {
        $caddypath = VALET_BIN_PATH . '\\..\\';
        $public_path = realpath(getcwd()) . '\public';

        info('Starting Caddy');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\caddy.exe -conf ' . $caddypath . '\Caddyfile -root ' . $public_path);
    }

    function stop()
    {
        info('Kill the Caddy');
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}