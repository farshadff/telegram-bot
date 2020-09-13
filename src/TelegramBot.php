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
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendMessage?text=' . $message.'&chat_id='.$this->chat_id, []);
    }

    public function sendPhoto($photo = null,$caption=null)
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendPhoto&photo=' . $photo,'&caption='.$caption.'&chat_id='.$this->chat_id, []);
    }

    public function sendLocation($lat = null,$long=null)
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/sendLocation&latitude=' . $lat.'&longitude='.$long.'&chat_id='.$this->chat_id, []);
    }
    public function getChatMembersCount()
    {
        $this->client->get($this->apiBaseUri . 'bot' . $this->token . '/getChatMembersCount&'.'&chat_id='.$this->chat_id, []);
    }

}
