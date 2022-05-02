<?php

namespace Airpwn\AdminLTELaravel\Facades;

use Illuminate\Support\Facades\Facade;

class AdminLTELaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'adminlte-laravel';
    }
}
