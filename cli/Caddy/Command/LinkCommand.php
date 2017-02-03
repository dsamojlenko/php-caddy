<?php namespace Caddy\Command;

use Caddy\Output;
use Caddy\Site;

class LinkCommand
{
    public function __invoke(Site $site)
    {
        $site->link(getcwd());
        Output::info('Linked Caddy to current directory: ' . getcwd());
    }
}