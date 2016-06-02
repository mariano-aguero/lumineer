# Installation
1) In order to install Laravel 5 Lumineer, just add the following to your composer.json. Then run `composer update`:

    "Peaches/Lumineer": "1.0.*"

or you can run the `composer require` command from your terminal:

    composer require "Peaches/Lumineer:1.0.*"

2) Then in your `config/app.php` add the following to the providers array:
```php
    Peaches\Lumineer\LumineerServiceProvider::class,
```
3) In the same `config/app.php` and add the following to the `aliases ` array:
```php
    'Lumineer'   => Peaches\Lumineer\LumineerFacade::class,
```

4) If you are going to use [Middleware](middleware.md) (requires Laravel 5.1 or later) you also need to add the folliwong to `routeMiddleware` array in `app/Http/Kernel.php`.
```php
    'role' => \Peaches\Lumineer\Middleware\LumineerRole::class,
    'permission' => \Peaches\Lumineer\Middleware\LumineerPermission::class,
    'ability' => \Peaches\Lumineer\Middleware\LumineerAbility::class,
```