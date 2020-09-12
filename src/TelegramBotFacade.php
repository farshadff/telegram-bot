<?php

namespace Farshad\TelegramBot;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Farshad\TelegramBot\Skeleton\SkeletonClass
 */
class TelegramBotFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telegram-bot';
    }
}
