<?php namespace Caddy;

use Symfony\Component\Console\Output\ConsoleOutput;

class Output
{

    /**
     * Output the given text to the console.
     *
     * @param  string  $output
     * @return void
     */
    static function info($output)
    {
        static::output('<info>'.$output.'</info>');
    }

    /**
     * Output the given text to the console.
     *
     * @param  string  $output
     * @return void
     */
    static function warning($output)
    {
        static::output('<fg=red>'.$output.'</>');
    }

    /**
     * Output the given text to the console.
     *
     * @param  string  $output
     * @return void
     */
    static function output($output)
    {
        if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'testing') {
            return;
        }

        (new ConsoleOutput)->writeln($output);
    }
}