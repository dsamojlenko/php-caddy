<?php namespace Caddy\Command;

use Caddy\Caddy;
use Caddy\Mailhog;
use Caddy\Output;
use Caddy\PhpCgi;

class ServiceCommand
{
    /**
     * @var Caddy
     */
    private $caddy;
    /**
     * @var Mailhog
     */
    private $mailhog;
    /**
     * @var PhpCgi
     */
    private $php;

    public function __construct(Caddy $caddy, Mailhog $mailhog, PhpCgi $php)
    {
        $this->caddy = $caddy;
        $this->mailhog = $mailhog;
        $this->php = $php;
    }

    public function __invoke($service, $cmd)
    {
        if (!$service || !$cmd) {
            Output::warning('Missing option');

            return;
        }

        if (method_exists($this, $service)) {
            $this->{$service}($cmd);
        }

        Output::warning('Unable to manage ' . $service . ' service');
    }

    function mailhog($cmd)
    {
        if ($cmd == 'start') {
            $this->mailhog->start();
            Output::info('Mailhog started');
            Output::info('You may access mailhog at http://localhost:8025');
            Output::info('SMTP service is available at 127.0.0.1:1025');
            exit;
        }

        if ($cmd == 'stop') {
            $this->mailhog->stop();
            Output::info('Mailhog stopped');
            exit;
        }

        if ($cmd == 'restart') {
            $this->mailhog->restart();
            Output::info('Mailhog restarted');
            exit;
        }

        Output::warning('Unknown command');
        exit;
    }

    function caddy($cmd)
    {
        if ($cmd == 'start') {
            $this->caddy->start();
            Output::info('Caddy started');
            Output::info('You may access your site at http://localhost');
            exit;
        }

        if ($cmd == 'stop') {
            $this->caddy->stop();
            Output::info('Caddy stopped');
            exit;
        }

        if ($cmd == 'restart') {
            $this->caddy->restart();
            Output::info('Caddy restarted');
            exit;
        }

        Output::warning('Unknown command');
        exit;
    }

    function php($cmd)
    {
        if ($cmd == 'start') {
            $this->php->start();
            Output::info('PHP started');
            exit;
        }

        if ($cmd == 'stop') {
            $this->php->stop();
            Output::info('PHP stopped');
            exit;
        }

        if ($cmd == 'restart') {
            $this->php->restart();
            Output::info('PHP restarted');
            exit;
        }

        Output::warning('Unknown command');
        exit;
    }
}