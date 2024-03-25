# Setup Guide

## pre requisites

### scoop

[scoop](https://scoop.sh/) is a package manager for Windows. 
To install it use:

```powershell
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
```

see the [official installation guide](https://github.com/ScoopInstaller/Install) for more assistance

### aria2 (optional)

aria2 is a download manager, it will make the next downloads faster but is not required. To install it use:
```powershell
scoop install main/aria2
```

## apache

if you have apache installed via xampp/wamp then you can use that.
if not install it via: 
```powershell
scoop install main/apache
```

next, you will need to edit the `httpd.conf` file.

set the document root attributes to match

```apache
DocumentRoot "C:\Users\<USERNAME>\Documents\Tenant-landlord-system\htdocs"
<Directory "C:\Users\<USERNAME>\Documents\Tenant-landlord-system\htdocs">
```

make sure the AllowOverride is set under the directory config 
```ini
AllowOverride All
```
to enable the `.htaccess` files to set permissions and redirects

## php

if your using xampp then you can most likely skip this section,
else install php using:
```powershell
scoop install main/php
```

if you have apache installed via scoop you need to add the php handler for php files in the `httpd.conf` file
```apache
# path to where php is instlled
Define PHPROOT "C:\Users\<USERNAME>\scoop\apps\php\current"

# load the php apache module
LoadModule php_module "${PHPROOT}/php8apache2_4.dll"
# php.ini config file location
PHPIniDir "${PHPROOT}\php.ini"

# files ending in .php are handled by the php apache module
<FilesMatch "\.php$">
    SetHandler application/x-httpd-php
</FilesMatch>
```

to enable the required extensions: 
1) go to `~/scoop/apps/php/current`
2) copy `php.ini-development` to `php.ini`
3) uncomment:
    - mysqli
    - openssl
    - ldap

if you get errors with locating the DLL files for an extension try setting:
```ini
extension_dir = "C:\Users\<USERNAME>\scoop\apps\php\current\ext"
```

[scoop has some official docs on how to set this up](https://github.com/ScoopInstaller/Scoop/wiki/Apache-with-PHP) that is slightly simpler.

## composer
[composer](https://getcomposer.org/) is a project-level dependency manager for php

to install composer run:
```powershell
scoop install main/composer
```

to use composer to install [predis](https://github.com/predis/predis) and the other dependencies navigate to the root of the git repo and run:
```powershell
composer update
```

you should see a `vendor` folder appear in the root after the command is done

## redis

[redis](https://redis.io/) is an in-memory key-value store.

to install it run
```powershell
scoop install main/redis
```

to run the redis server open a new powershell window and type:
```powershell
redis-server.exe
```
you can use tab auto complete as scoop adds a shim automatically.

to run redis cli, run:
```powershell
redis-cli.exe
```

A useful command to list the contents of redis is
```
KEYS *
```

see the [cheatsheet](https://developer.redis.com/howtos/quick-start/cheat-sheet/) for more useful commands

## python

to install python run
```powershell
scoop install main/python
```

## mysql/mariaDB

if you have a database installed already via something like xampp then you can use that.

scoop can install MariaDB or MySQL via:
```powershell
scoop install main/mariadb
scoop install main/mysql
```

you only need one. I recommend MariaDB.

to setup the database go to the specific [database setup guide](https://github.com/Sovietsupporter69/Tenant-landlord-system/blob/master/database/docs.md)