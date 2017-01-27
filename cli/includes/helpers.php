<?php

use Illuminate\Container\Container;
use Symfony\Component\Process\Process;

/**
 * Define the ~/.valet path as a constant.
 */
$bin = realpath(dirname(__FILE__));
$bin .= '\\..\\..\\bin\\';
define('VALET_BIN_PATH', $bin);
// define('CMD_VALET_START', 'start "Valet" cmd.exe /i/k "cd /d ' . VALET_BIN_PATH . '..\ && start.bat"');

/**
 * Output the given text to the console.
 *
 * @param  string  $output
 * @return void
 */
function info($output)
{
    output('<info>'.$output.'</info>');
}

/**
 * Output the given text to the console.
 *
 * @param  string  $output
 * @return void
 */
function warning($output)
{
    output('<fg=red>'.$output.'</>');
}

/**
 * Output the given text to the console.
 *
 * @param  string  $output
 * @return void
 */
function output($output)
{
    if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'testing') {
        return;
    }

    (new Symfony\Component\Console\Output\ConsoleOutput)->writeln($output);
}


/* not sure I need these */

if (! function_exists('resolve')) {
    /**
     * Resolve the given class from the container.
     *
     * @param  string  $class
     * @return mixed
     */
    function resolve($class)
    {
        return Container::getInstance()->make($class);
    }
}

/**
 * Swap the given class implementation in the container.
 *
 * @param  string  $class
 * @param  mixed  $instance
 * @return void
 */
function swap($class, $instance)
{
    Container::getInstance()->instance($class, $instance);
}


