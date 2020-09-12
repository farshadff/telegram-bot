
<?php

namespace Farshadff\TelegramBot;

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
        $this->app->when(TelegramChannel::class)
            ->needs(Telegram::class)
            ->give(static function () {
                return new Telegram(
                    config('services.telegram-bot-api.token'),
                    app(HttpClient::class),
                    config('services.telegram-bot-api.base_uri')
                );
            });
    }
    /**
     * Register the application services.
     */
    public function register(){
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'telegram-bot');

        $this->app->singleton('telegram-bot', function () {
            return new TelegramBot;
        });
    }
}
