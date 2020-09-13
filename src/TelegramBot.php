<?php


namespace TelegramBot;


class TelegramBot
{

    /**
     * TelegramBot constructor.
     */
    public function __construct()
    {
        $this->apiBaseUri = config('services.telegram-bot-api.base_uri') ?? 'https://api.telegram.org';
        $this->token = config('services.telegram-bot-api.token');
        $this->chat_id = config('services.telegram-bot-api.chat_id');
        $this->client = new \GuzzleHttp\Client();
    }

    public function sendMessage($message = null)
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendMessage?text=' . $message, []);
    }

    public function sendPhoto($message = null)
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendMessage' . $message, []);
    }

    public function sendLocation($message = null)
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendMessage' . $message, []);
    }
}
