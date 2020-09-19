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
        $this->parse_mode = config('services.telegram-bot-api.parse_mode');
    }

    public function sendMessage($message = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendMessage?text=' . $message . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendPhoto($photo = null, $caption = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendPhoto&photo=' . $photo . '&caption=' . $caption . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendLocation($lat = null, $long = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendLocation&latitude=' . $lat . '&longitude=' . $long . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendAudio($audio = null, $caption = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendAudio&audio=' . $audio . '&caption' . $caption . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendDocument($document = null, $caption = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendDocument&document=' . $document . '&caption' . $caption . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendVideo($video = null, $caption = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendVideo&video=' . $video . '&caption' . $caption . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendAnimation($animation = null, $caption = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendAnimation&animation=' . $animation . '&caption' . $caption . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function sendContact($phone_number = null, $first_name = null)
    {
        $this->client->get($this->apiBaseUri . $this->token . '/sendContact&phone_number=' . $phone_number . '&first_name' . $first_name . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

    public function getChatMembersCount()
    {
        $this->client->get($this->apiBaseUri . $this->token . '/getChatMembersCount&' . '&chat_id=' . $this->chat_id . '&parse_mode=' . $this->parse_mode, []);
    }

}
