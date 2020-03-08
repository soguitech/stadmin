# stadmin
## Installation

> This package requires PHP 7+ and Laravel 5.6 or high

First, install laravel 5.6 or high.

Then run these commands to publish assets and config：

```bash
    php artisan vendor:publish --provider="Soguitech\Stadmin\StadminServiceProvider"
```

After run command you can find config file in **config/stadmin.php**, in this file you can make yout config.

Run following command to finish install.

```bash
    php artisan stadmin:install
```

## Configure Auth guard
Inside the `config/auth.php` file you will need to make a few changes to configure Laravel to use the **stadmin** guard to power your application authentication.

Make the following changes to the file:

```php
    'guards' => [
        // ...
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

     'providers' => [
        // ...
        'admins' => [
            'driver' => 'eloquent',
            'model' => Soguitech\Stadmin\Models\Auth\Admin::class,
        ],
    ],

    'passwords' => [
        // ...
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
```