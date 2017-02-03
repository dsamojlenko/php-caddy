# PHP Caddy

## Introduction
PHP Caddy is a **tiny** PHP development environment for Windows, inspired by Laravel Valet.

**No hosts file, no configuration, no frills.  Just run it and go write some code.**

PHP Caddy is basically a stripped down Valet: no *.dev domain proxy (only localhost), no linking multiple sites or
parking whole directories, and no sharing over local tunnels.  It also doesn't require elevated privileges to run
like some of the other Windows alternatives, which can make things easier for people in corporate environments.

Built with [Caddy](https://caddyserver.com/) web server, PHP Caddy also includes [Mailhog](https://github.com/mailhog/MailHog) 
for catching email sent by your application.

This package is for minimalists.  It does not have the full feature set of Valet, and it doesn't provide the
robust features of a virtualized environment like Homestead.
- If you are on MacOS you should probably just use [Laravel Valet](https://laravel.com/docs/5.4/valet) because it's awesome.  
- If you want something more Valet-like for Windows, check out [valet-windows](https://github.com/cretueusebiu/valet-windows).
- If you want a fully virtualized Linux development environment, use [Laravel Homestead](https://laravel.com/docs/5.4/homestead).
- If you're on Windows and you want a fast, easy to use local development environment with minimal resource consumption, read on!

## Requirements
- [PHP](http://windows.php.net/) (installed in C:\php and configured for Laravel)
- [Composer](https://getcomposer.org/)
- A database, if you need one (MySql/Mariadb/Sqlite)

## Installation instructions
```
composer global require samojled/php-caddy
```

## Usage
Make sure your global composer vendor/bin folder is in your system path.

### Start it up
```
cd {your php project directory}
caddy start
```

Site will be available at:
- http://localhost
- Mailhog will be available at http://localhost:8025
- Set your outgoing SMTP to 127.0.0.1:1025

### Shut it down
```
caddy stop
```

### Control individual services
```
# Mailhog
caddy service mailhog start
caddy service mailhog stop
caddy service mailhog restart

# Http (Caddy)
caddy service http start
caddy service http stop
caddy service http restart

# PHP
caddy service php start
caddy service php stop
caddy service php restart
```

### Available Commands

| Command | Description |
| --- | --- |
| `caddy install` | Install PHP Caddy services |
| `caddy start` | Start the Caddy services and Link the current directory. |
| `caddy start --without-mailhog` | For a slightly lighter resource footprint |
| `caddy stop` | Stop the Caddy services |
| `caddy which` | Determine which Valet driver serves the current working directory |
| `caddy uninstall` | Remove PHP Caddy services |
| `caddy service [service] [command]` | Start or Stop services |

## Supported Frameworks and Applications
PHP Caddy comes with the same default set of drivers as Valet, so out of the box it supports:

- Laravel
- Lumen
- Symfony
- Zend
- CakePHP 3
- WordPress
- Bedrock
- Craft
- Statamic
- Jigsaw
- Static HTML

### Custom Valet Drivers
 
You can write your own Valet driver to support PHP applications not in the list above, in the same way you can with
Laravel Valet.  

When you install PHP Caddy, a `~/.phpcaddy/Drivers` directory is created which contains a `SampleValetDriver.php` file
you can use as a guide.  To use your custom driver, either place it in the `~/.phpcaddy/Drivers` directory, or in the 
root path of your project, and it will be picked up by PHP Caddy.

See more info on creating custom drivers in the Laravel Valet docs: 
[Custom Valet Drivers](https://laravel.com/docs/5.4/valet#custom-valet-drivers) 

## License and Attribution
Parts of the original [Laravel Valet](https://laravel.com/docs/5.4/valet) source code were used in whole or in part 
in building this project, and are covered under the original Valet License 
- [Valet License](ValetLicense.txt)

The Caddy and Mailhog binaries are covered under their respective licenses. 
- [Caddy License](bin/CaddyLicense.txt) 
- [Mailhog License](bin/MailhogLicense.txt)

PHP Caddy is Copyright (c) 2017 Dave Samojlenko and licensed under the MIT license 
- [PHP Caddy License](LICENSE.txt)