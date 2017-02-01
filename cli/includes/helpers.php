<?php

/*
 * Get the package paths and set as constants
 */
$package_includes_path = realpath(dirname(__FILE__));
$package_base_path = $package_includes_path . '\\..\\..\\';
$package_bin_path = $package_base_path . '\\bin\\';

define('BIN_PATH', $package_bin_path);
define('BASE_PATH', $package_base_path);
define('VALET_STATIC_PREFIX', '41c270e4-5535-4daa-b23e-c269744c2f45');

/**
 * Define the ~/.valet path as a constant.
 */
define('VALET_HOME_PATH', $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'].'/.phaddy');

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

/**
 * Tap the given value.
 *
 * @param  mixed  $value
 * @param  callable  $callback
 * @return mixed
 */
function tap($value, callable $callback)
{
    $callback($value);
    return $value;
}

/**
 * Get the user
 */
function user()
{
    if (! isset($_SERVER['SUDO_USER'])) {
        return $_SERVER['USERNAME'];
    }
    return $_SERVER['SUDO_USER'];
}