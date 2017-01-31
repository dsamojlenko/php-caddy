<?php

/**
 * Check the system's compatibility.
 */
$inTestingEnvironment = strpos($_SERVER['SCRIPT_NAME'], 'phpunit') !== false;

if (PHP_OS != 'WINNT' && ! $inTestingEnvironment) {
    echo 'GCSX Caddy only supports the Windows operating system.'.PHP_EOL;
    exit(1);
}

if (version_compare(PHP_VERSION, '5.5.9', '<')) {
    echo "GCSX Caddy requires PHP 5.5.9 or later.";

    exit(1);
}

if (!file_exists('C:\php\php-cgi.exe')) {
    echo "GCSX Caddy requires php-cgi.exe to be installed in C:\\php";

    exit(1);
}
