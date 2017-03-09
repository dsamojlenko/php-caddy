<?php namespace Caddy;

class PhpCgi
{
    /**
     * @var HiddenConsole
     */
    private $hiddenConsole;
    /**
     * @var Filesystem
     */
    private $files;

    function __construct(HiddenConsole $hiddenConsole, Filesystem $files)
    {
        $this->hiddenConsole = $hiddenConsole;
        $this->files = $files;
    }

    function start()
    {
        return $this->restart();
    }

    function restart()
    {
        if (!$this->installed())
        {
            Output::warning('PHP-cgi is not installed');
            return false;
        }

        $this->stop();
        exec('set PHP_FCGI_CHILDREN=2 && ' . $this->hiddenConsole->path() . ' ' . $this->path() . ' -b 127.0.0.1:9000');
        return true;
    }

    function stop()
    {
        exec('taskkill /im php-cgi.exe /f >nul 2>&1');
    }

    function installed()
    {
        return $this->files->exists($this->path());
    }

    function path()
    {
        // can we determine this dynamically?
        return 'C:\php\php-cgi.exe';
    }
}