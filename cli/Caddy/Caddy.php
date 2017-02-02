<?php namespace Caddy;

class Caddy
{
    function restart()
    {
        $console_bin = CADDY_BIN_PATH . '\RunHiddenConsole.exe';
        $caddy_bin = CADDY_BIN_PATH . '\caddy.exe';

        $args = '-root ' . PACKAGE_BASE_PATH;
        $args .= ' -conf ' . PACKAGE_BASE_PATH . '\Caddyfile';

        $this->stop();
        exec($console_bin . ' ' . $caddy_bin . ' ' . $args);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }
}