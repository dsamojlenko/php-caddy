<?php namespace Caddy;

class Caddy
{
    function up()
    {
        info('Caddying up...');

        $public_path = realpath(getcwd()) . '\public';
        info('Web root: ' . $public_path);

        exec(VALET_BIN_PATH . 'RunHiddenConsole.exe ' . VALET_BIN_PATH . 'caddy.exe -conf Caddyfile -root ' . $public_path);

        info('Success!');
        info('You may access your site at http://localhost');
        info('You may access mailhog at http://localhost:8025');
    }

    function down()
    {
        info('Caddying down...');
        info('Kill the Caddy');
        exec('taskkill /im caddy.exe');
        info('Kill the Mailhog');
        exec('taskkill /im mailhog.exe');
        info('Kill the Php');
        exec('taskkill /im php-cgi.exe');
    }
}