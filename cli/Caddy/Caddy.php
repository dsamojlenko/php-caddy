<?php namespace Caddy;

class Caddy
{
    function up()
    {
        info('Caddying up...');

        $caddypath = VALET_BIN_PATH . '\\..\\';
        $public_path = realpath(getcwd()) . '\public';
        info('Web root: ' . $public_path);

        info('Starting php-cgi');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . 'C:\php\php-cgi.exe -b 127.0.0.1:9000');

        info('Starting mailhog');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\mailhog.exe');

        info('Starting Caddy');
        exec(VALET_BIN_PATH . '\RunHiddenConsole.exe ' . VALET_BIN_PATH . '\caddy.exe -conf ' . $caddypath . '\Caddyfile -root ' . $public_path);

        info('We make Success!');
        info('You may access your site at http://localhost');
        info('You may access mailhog at http://localhost:8025');
    }

    function down()
    {
        info('Caddying down...');

        info('Kill the Caddy');
        exec('taskkill /im caddy.exe /f >nul 2>&1');

        info('Kill the Mailhog');
        exec('taskkill /im mailhog.exe /f >nul 2>&1');

        info('Kill the Php');
        exec('taskkill /im php-cgi.exe /f >nul 2>&1');
    }

    function status()
    {

    }
}