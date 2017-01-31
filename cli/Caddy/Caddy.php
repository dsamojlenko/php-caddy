<?php namespace Caddy;

class Caddy
{
    function restart()
    {
        $site_root = realpath(getcwd());
        $caddy_file = BASE_PATH . '\Caddyfile';

        $console_bin = BIN_PATH . '\RunHiddenConsole.exe';
        $caddy_bin = BIN_PATH . '\caddy.exe';

        $args = '-root ' . $site_root;
        $args .= ' -conf ' . $caddy_file;

        $this->stop();
        exec($console_bin . ' ' . $caddy_bin . ' ' . $args);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}