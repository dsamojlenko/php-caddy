<?php

/*
 * Get the package paths and set as constants
 */
$package_includes_path = realpath(dirname(__FILE__));
$package_base_path = $package_includes_path . '\\..\\..\\';
$package_bin_path = $package_base_path . '\\bin\\';

define('CADDY_BIN_PATH', $package_bin_path);
define('PACKAGE_BASE_PATH', $package_base_path);

/**
 * Define the ~/.phpcaddy path as a constant.
 */
define('CADDY_HOME_PATH', $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'].'/.phpcaddy');

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