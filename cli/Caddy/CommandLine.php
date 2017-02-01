<?php namespace Caddy;

class CommandLine
{
    public function runCommand($command)
    {
        exec($command);
        return;
    }
}