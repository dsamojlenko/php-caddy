# Introduction
GCSX Caddy is a tiny Windows dev environment for Laravel applications.  Based on [Caddy](https://caddyserver.com/), 
this package also includes [Mailhog](https://github.com/mailhog/MailHog) for catching your applications emails.  

**No hosts file, no configuration.  Just run it and go.**

**NOTE**: This package is very limited in its capabilities and it may not work for your particular use-case.  
- If you are on MacOS you should probably just use [Laravel Valet](https://laravel.com/docs/5.4/valet).  
- If you want something more Valet-like for Windows, check out [Valet4Windows](https://github.com/vitr/valet4windows).

## Requirements
- [PHP](http://windows.php.net/) (installed in C:\php and configured for Laravel)
- [Composer](https://getcomposer.org/)
- A database, if you need (MySql/Mariadb/Sqlite)

## Installation instructions
```
composer global config repositories.repo-name vcs https://gitlab.com/gcsx/caddy.git
composer global require gcsx/caddy:dev-master
```

## Usage
Make sure your global composer/vendor/bin folder is in your system path.

Execute the following commands in Git Bash.

### Start it up:
```
cd {your laravel project directory}
caddy up
```

Site will be available at:
http://localhost

Mailhog will be available at http://localhost:8025

Set your outgoing SMTP to 127.0.0.1:1025

### Shut it down:
```
caddy down
```