<?php


namespace Soguitech\Stadmin\Facades;


use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin';
    }
}