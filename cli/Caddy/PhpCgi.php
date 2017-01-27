<?php namespace Caddy;

class PhpCgi
{
    function start()
    {
        info('Starting php-cgi');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . 'C:\php\php-cgi.exe -b 127.0.0.1:9000');
    }

    function stop()
    {
        info('Kill the Php');
        exec('taskkill /im php-cgi.exe /f >nul 2>&1');
    }
}