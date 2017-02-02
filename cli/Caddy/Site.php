<?php namespace Caddy;

class Site
{
    /**
     * @var Filesystem
     */
    private $files;

    /**
     * Site constructor.
     * @param Filesystem $files
     */
    function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    function link($target)
    {
        $this->files->ensureDirExists(CADDY_HOME_PATH);
        $this->files->symlink($target, CADDY_HOME_PATH . '\\site');
    }
}