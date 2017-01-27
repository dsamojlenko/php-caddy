
# Installation instructions
```
composer global config repositories.repo-name vcs https://gitlab.com/gcsx/caddy.git
composer global require gcsx/caddy:dev-master
```

## Usage

Make sure your global composer/vendor/bin folder is in your system path.

### Start it up:
```
cd {your laravel project directory}
caddy up
```

### Shut it down:
```
caddy down
```