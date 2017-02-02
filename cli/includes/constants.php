<?php

/*
 * Get the package paths and set as constants
 */
$package_includes_path = realpath(dirname(__FILE__));
$package_base_path = $package_includes_path . '\\..\\..\\';

define('PACKAGE_BASE_PATH', $package_base_path);
define('CADDY_HOME_PATH', $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'].'/.phpcaddy');
define('CADDY_BIN_PATH', CADDY_HOME_PATH . '/bin');
