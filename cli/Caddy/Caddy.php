<?php namespace Caddy;

class Caddy
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
        $this->installCaddyBin();
    }

    function restart()
    {
        $args = '-root ' . PACKAGE_BASE_PATH;
        $args .= ' -conf ' . PACKAGE_BASE_PATH . '\Caddyfile';

        $this->stop();
        exec($this->hiddenConsole->path() . ' ' . $this->path() . ' ' . $args);
    }

    function stop()
    {
        exec('taskkill /im caddy.exe /f >nul 2>&1');
    }

    function installCaddyBin()
    {
        $this->files->put(
            $this->path(),
            $this->files->get(PACKAGE_BASE_PATH . '/bin/caddy.exe')
        );
    }

    function uninstall()
    {
        $this->stop();
        $this->files->unlink($this->path());
    }

    function path()
    {
        return CADDY_BIN_PATH . '/caddy.exe';
    }
}