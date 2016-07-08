# action-log
Laravel 5 操作日志自动记录


## Installation

The ActionLog Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`luoyangpeng/action-log` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
project's `composer.json`.

```json
{
    "require": {
       
        "luoyangpeng/action-log": "dev-master"
    },
   
}
```

or

Require this package with composer:
```
composer require luoyangpeng/action-log dev-master
```

Update your packages with ```composer update``` or install with ```composer install```.

In Windows, you'll need to include the GD2 DLL `php_gd2.dll` as an extension in php.ini.

## Usage

To use the ActionLog Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the ActionLog Service Provider.

```php
    'providers' => [
        // ...
        'luoyangpeng\ActionLog\ActionLogServiceProvider',
    ]
```
for Laravel 5.1+
```php
    'providers' => [
        // ...
        luoyangpeng\ActionLog\ActionLogServiceProvider::class,
    ]
```

Find the `aliases` key in `config/app.php`.

```php
    'aliases' => [
        // ...
        'ActionLog' => 'luoyangpeng\ActionLog\Facades\ActionLogFacade',
    ]
```
for Laravel 5.1+
```php
    'aliases' => [
        // ...
        'ActionLog' => luoyangpeng\ActionLog\Facades\ActionLogFacade::class,
    ]
```



## Configuration

To use your own settings, publish config.

```$ php artisan vendor:publish```

`config/actionlog.php`

```php
//填写要记录的日志的模型名称
	return [
		'\App\Models\Users',
	];
```
## Last Step
run:
```$ php artisan migrate```

## Demo
自动记录操作日志，数据库操作需按如下:
```php

update

$users = Users::find(1);
$users->name = "myname";
$users->save();

add

$users = new Users();
$users->name = "myname";
$users->save()

delete

Users:destroy(1);

```

主动记录操作日志

```php

use ActionLog

ActionLog::createActionLog($type,$content);

```



