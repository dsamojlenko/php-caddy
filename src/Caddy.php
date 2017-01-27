<?php namespace GCSX\Caddy;

class Caddy
{
    function up()
    {
        exec('caddy.exe');
    }

    function down()
    {
        exec('taskkill /im caddy.exe');
        // exec('taskkill /im mailhog.exe');
        // exec('taskkill /im php-cgi.exe');
    }
}