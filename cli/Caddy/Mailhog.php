<?php namespace Caddy;

class Mailhog
{
    /**
     * @var Filesystem
     */
    private $files;
    /**
     * @var HiddenConsole
     */
    private $hiddenConsole;

    function __construct(Filesystem $files, HiddenConsole $hiddenConsole)
    {
        $this->files = $files;
        $this->hiddenConsole = $hiddenConsole;
    }

    function install()
    {
        $this->stop();
        $this->files->put(
            $this->path(),
            $this->files->get(PACKAGE_BASE_PATH . '/bin/mailhog.exe')
        );
    }

    function start()
    {
        return $this->restart();
    }

    function restart()
    {
        if (!$this->installed())
        {
            Output::warning('Mailhog is not installed');
            return false;
        }

        $this->stop();
        exec($this->hiddenConsole->path() . ' ' . $this->path());
        return true;
    }

    function stop()
    {
        exec('taskkill /im mailhog.exe /f >nul 2>&1');
    }

    function uninstall()
    {
        $this->stop();
        $this->files->unlink($this->path());
    }

    function installed()
    {
        return $this->files->exists($this->path());
    }

    function path()
    {
        return CADDY_BIN_PATH . '/mailhog.exe';
    }
}