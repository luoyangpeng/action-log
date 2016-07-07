# action-log
Laravel 5 操作日志自动记录


## Installation

The ActionLog Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`mews/captcha` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
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

To use the Captcha Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the Captcha Service Provider.

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

