<?php namespace Caddy;

class Caddy
{
    function restart()
    {
        $public_path = realpath(getcwd()) . '\public';
        $caddy_file = BASE_PATH . '\Caddyfile';

        $console_bin = BIN_PATH . '\RunHiddenConsole.exe';
        $caddy_bin = BIN_PATH . '\caddy.exe';
        
        $args = '-root ' . $public_path;
        $args .= ' -conf ' . $caddy_file;

        $this->stop();
        exec($console_bin . ' ' . $caddy_bin . ' ' . $args);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}