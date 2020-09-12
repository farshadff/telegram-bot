<?php
 namespace  DirectDebitBoom\Facade;

use Illuminate\Support\Facades\Facade;

class Adaptor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adaptor';
    }
}
