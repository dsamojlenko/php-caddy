<?php namespace Caddy;

class Caddy
{
    function up()
    {
        output('Caddying up...');
        exec('bin\RunHiddenConsole.exe bin\caddy.exe -conf Caddyfile -root public');

        $path = realpath(getcwd());
        info($path);
    }

    function down()
    {
        info('Caddying down...');

        exec('taskkill /im caddy.exe');
        exec('taskkill /im mailhog.exe');
        exec('taskkill /im php-cgi.exe');
    }
}