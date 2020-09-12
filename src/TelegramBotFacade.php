<?php


namespace NotificationChannels\Telegram;


use Illuminate\Support\Facades\Facade;

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
