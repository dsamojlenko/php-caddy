<?php namespace Caddy;

class PhpCgi
{
    function start()
    {
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . 'C:\php\php-cgi.exe -b 127.0.0.1:9000');
    }

    function stop()
    {
        exec('taskkill /im php-cgi.exe /f >nul 2>&1');
    }
}