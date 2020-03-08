<?php

if (! function_exists('getModelForGuard')) {
    /**
     * @param string $guard
     *
     * @return string|null
     */
    function getModelForGuard(string $guard)
    {
        return collect(config('auth.guards'))
            ->map(function ($guard) {
                if (! isset($guard['provider'])) {
                    return;
                }

                return config("auth.providers.{$guard['provider']}.model");
            })->get($guard);
    }
}

if (!function_exists('stadmin_css_asset')) {

    /**
     * @param $path
     *
     * @return string
     */
    function stadmin_css_asset($path)
    {
        return config('stadmin.https') ? secure_asset('css/vendor/stadmin/' . $path) : asset('css/vendor/stadmin/' . $path);
    }
}

if (!function_exists('stadmin_js_asset')) {

    /**
     * @param $path
     *
     * @return string
     */
    function stadmin_js_asset($path)
    {
        return config('stadmin.https') ? secure_asset('js/vendor/stadmin/' . $path) : asset('js/vendor/stadmin/' . $path);
    }
}

if (!function_exists('stadmin_img_asset')) {

    /**
     * @param $path
     *
     * @return string
     */
    function stadmin_img_asset($path)
    {
        return config('stadmin.https') ? secure_asset('img/vendor/stadmin/' . $path) : asset('img/vendor/stadmin/' . $path);
    }
}