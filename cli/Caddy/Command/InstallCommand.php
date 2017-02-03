<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\HiddenConsole;
use Caddy\Output;
use Caddy\Filesystem;
use Caddy\Mailhog;

class InstallCommand
{
    /**
     * @var Filesystem
     */
    private $files;
    /**
     * @var Caddy
     */
    private $caddy;
    /**
     * @var Mailhog
     */
    private $mailhog;
    /**
     * @var HiddenConsole
     */
    private $hiddenConsole;

    public function __construct(Filesystem $files, Caddy $caddy, Mailhog $mailhog, HiddenConsole $hiddenConsole)
    {
        $this->files = $files;
        $this->caddy = $caddy;
        $this->mailhog = $mailhog;
        $this->hiddenConsole = $hiddenConsole;
    }

    public function __invoke()
    {
        Output::info('Installing PHP Caddy...');

        $this->createCaddyHomePath();
        $this->createCaddyBinPath();
        $this->createDriversDirectory();

        $this->caddy->install();
        $this->mailhog->install();
        $this->hiddenConsole->install();
    }

    public function createCaddyHomePath()
    {
        $this->files->ensureDirExists(CADDY_HOME_PATH);
    }

    public function createCaddyBinPath()
    {
        $this->files->ensureDirExists(CADDY_BIN_PATH);
    }

    /**
     * Create the Valet drivers directory.
     *
     * @return void
     */
    public function createDriversDirectory()
    {
        if ($this->files->isDir($driversDirectory = CADDY_HOME_PATH.'/Drivers')) {
            return;
        }
        $this->files->ensureDirExists(CADDY_HOME_PATH.'/Drivers');

        $this->files->put(
            $driversDirectory.'/SampleValetDriver.php',
            $this->files->get(PACKAGE_BASE_PATH . '/cli/stubs/SampleValetDriver.php')
        );
    }


}