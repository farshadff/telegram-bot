<?php

namespace TelegramBot;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

/**
 * Class TelegramServiceProvider.
 */
class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
//        $this->app->bind(TelegramBot::class,function ($app){
//            return new TelegramBot(
//                    config('services.telegram-bot-api.token'),
//                   app(HttpClient::class),
//                  config('services.telegram-bot-api.base_uri'),
//                   config('services.telegram-bot-api.chat_id')
//                );
//        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('telegram-bot', function () {
            return new TelegramBot;
        });
    }
}
