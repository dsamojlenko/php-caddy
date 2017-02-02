<?php namespace Caddy;

class HiddenConsole
{
    /**
     * @var Filesystem
     */
    private $files;

    function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    function install()
    {
        $this->files->put(
            $this->path(),
            $this->files->get(PACKAGE_BASE_PATH . '/bin/RunHiddenConsole.exe')
        );
    }

    function uninstall()
    {
        $this->files->unlink($this->path());
    }

    function path()
    {
        return CADDY_BIN_PATH . '/RunHiddenConsole.exe';
    }
}