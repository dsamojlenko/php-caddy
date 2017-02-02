<?php namespace Caddy;

class PhpCgi
{
    /**
     * @var HiddenConsole
     */
    private $hiddenConsole;

    function __construct(HiddenConsole $hiddenConsole)
    {
        $this->hiddenConsole = $hiddenConsole;
    }

    function restart()
    {
        $this->stop();
        exec($this->hiddenConsole->path() . ' ' . $this->path() . ' -b 127.0.0.1:9000');
    }

    function stop()
    {
        exec('taskkill /im php-cgi.exe /f >nul 2>&1');
    }

    function path()
    {
        // can we determine this dynamically?
        return 'C:\php\php-cgi.exe';
    }
}