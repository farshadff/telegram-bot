<?php


namespace TelegramBot;


class TelegramBot
{

    /**
     * TelegramBot constructor.
     */
    public function __construct($apiBaseUri=null,$token=null,$chat_id=null)
    {
        $this->apiBaseUri =config('services.telegram-bot-api.base_uri') ?? 'https://api.telegram.org';
        $this->token =  config('services.telegram-bot-api.token');
        $this->chat_id = config('services.telegram-bot-api.chat_id');
    }

    public function sendMessage($message = null){
        $client = new \GuzzleHttp\Client();
        $client->get($this->apiBaseUri.'bot'.$this->token.'sendMessage'.$message, [
        ]);
    }
    public function sendPhoto($message = null){
        $client = new \GuzzleHttp\Client();
        $client->get($this->apiBaseUri.'bot'.$this->token.'sendMessage'.$message, [
        ]);
    }
    public function sendLocation($message = null){
        $client = new \GuzzleHttp\Client();
        $client->get($this->apiBaseUri.'bot'.$this->token.'sendMessage'.$message, [
        ]);
    }
}
