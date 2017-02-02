<?php

namespace Caddy;

class Filesystem
{

    /**
     * @var CommandLine
     */
    private $cmd;

    public function __construct(CommandLine $cmd)
    {
        $this->cmd = $cmd;
    }

    function symlink($target, $link)
    {
        if ($this->exists($link)) {
            $this->unlink($link);
        }

        $this->cmd->runCommand('mklink /j "' . $link . '" "' . $target . '"');
    }

    /**
     * Determine if the given path is a directory.
     *
     * @param  string  $path
     * @return bool
     */
    function isDir($path)
    {
        return is_dir($path);
    }

    /**
     * Create a directory.
     *
     * @param  string  $path
     * @param  string|null  $owner
     * @param  int  $mode
     * @return void
     */
    function mkdir($path, $owner = null, $mode = 0755)
    {
        mkdir($path, $mode, true);

        if ($owner) {
            $this->chown($path, $owner);
        }
    }

    /**
     * Change the owner of the given path.
     *
     * @param  string  $path
     * @param  string  $user
     */
    function chown($path, $user)
    {
        chown($path, $user);
    }

    /**
     * Ensure that the given directory exists.
     *
     * @param  string  $path
     * @param  string|null  $owner
     * @param  int  $mode
     * @return void
     */
    function ensureDirExists($path, $owner = null, $mode = 0755)
    {
        if (! $this->isDir($path)) {
            $this->mkdir($path, $owner, $mode);
        }
    }

    /**
     * Determine if the given file exists.
     *
     * @param  string  $path
     * @return bool
     */
    function exists($path)
    {
        return file_exists($path);
    }

    /**
     * Delete the file at the given path.
     *
     * @param  string  $path
     * @return void
     */
    function unlink($path)
    {
        if ($this->isDir($path) || is_link($path)) {
            @rmdir($path);
        }

        @unlink($path);
    }

    /**
     * Read the contents of the given file.
     *
     * @param string $path
     *
     * @return string
     */
    public function get($path)
    {
        return file_get_contents($path);
    }

    /**
     * Write to the given file.
     *
     * @param string      $path
     * @param string      $contents
     * @param string|null $owner
     *
     * @return string
     */
    public function put($path, $contents, $owner = null)
    {
        file_put_contents($path, $contents);
        if ($owner) {
            $this->chown($path, $owner);
        }
    }


}