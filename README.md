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

## routes file
In your web file add this code below :

```php
    Route::get(config('stadmin.route.prefix') . '/{any}', function () {
        return view('vendor/stadmin/welcome');
    })->where('any', '.*');
```

## Composer file
Add these below packages to your `package.json` file in dependencies :

```composer log
    "@vue/composition-api": "^0.3.4",
    "element-ui": "^2.13.0",
    "laravel-echo": "^1.6.0",
    "link-prevue": "^1.1.3",
    "loadash": "^1.0.0",
    "moment": "^2.24.0",
    "nprogress": "^0.2.0",
    "socket.io-client": "^2.2.0",
    "vue-avatar": "^2.1.8",
    "vue-chat-scroll": "^1.3.5",
    "vue-router": "^3.1.3",
    "vue-runtime-helpers": "^1.1.2",
    "vuex": "^3.1.1"
```
Run `npm install` or `yarn install`.

## Webpack file
Update your application's `webpack.mix.js` file to this :

```javascript
mix.js('resources/js/vendor/stadmin/app.js',
    'public/js/vendor/stadmin')
```
and run `npm run dev`.