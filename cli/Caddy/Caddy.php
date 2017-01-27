<?php namespace Caddy;

class Caddy
{
    function up()
    {
        info('Caddying up...');

        $public_path = realpath(getcwd()) . '\public';
        info('Web root: ' . $public_path);
        info('Caddy bin: ' . VALET_BIN_PATH);

        exec(VALET_BIN_PATH . 'RunHiddenConsole.exe ' . VALET_BIN_PATH . 'caddy.exe -conf Caddyfile -root ' . $public_path);
    }

    function down()
    {
        info('Caddying down...');

        exec('taskkill /im caddy.exe');
        exec('taskkill /im mailhog.exe');
        exec('taskkill /im php-cgi.exe');
    }
}