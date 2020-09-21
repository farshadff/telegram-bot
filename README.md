<p align="center">
 <img src="https://i.imgur.com/rSyq3MW.png" alt="The Documentation Compendium"></a>
</p>

<h3 align="center">The Documentation Compendium</h3>

<div align="center">

  [![Tweet](https://img.shields.io/twitter/url/https/shields.io.svg?style=social)](https://twitter.com/intent/tweet?text=Telegram.&url=https://github.com/kylelobo/The-Documentation-Compendium)
  [![Status](https://img.shields.io/badge/status-active-success.svg)]()
  [![GitHub Issues](https://img.shields.io/github/issues/farshadff/telegram-bot)](https://github.com/farshadff/telegram-bot/issues)
  [![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/farshadff/telegram-bot/pulls)
  [![License](https://img.shields.io/badge/license-CC0-blue.svg)](http://creativecommons.org/publicdomain/zero/1.0/)

<!--   <a href="https://www.producthunt.com/posts/the-documentation-compendium?utm_source=badge-top-post-badge&utm_medium=badge&utm_souce=badge-the-documentation-compendium" target="_blank"><img src="https://api.producthunt.com/widgets/embed-image/v1/top-post-badge.svg?post_id=157965&theme=dark&period=daily" alt="The Documentation Compendium - Beautiful README templates that people want to read. | Product Hunt Embed" style="width: 250px; height: 54px;" width="250px" height="54px" /></a> -->

</div>

---

<p align = "center">💡 This Package Help Your Laravel Application to Send Data To Your Telegram Channel.</p>

# laravel-Telegram-Bot
![Current Version](https://img.shields.io/badge/version-v0.1-blue)
![GitHub contributors](https://img.shields.io/github/contributors/farshadff/README-Template)
![GitHub stars](https://img.shields.io/github/stars/farshadff/README-Template?style=social)
![GitHub forks](https://img.shields.io/github/forks/farshadff/README-Template?style=social)
![Twitter Follow](https://img.shields.io/twitter/follow/farshadff?style=social)


## Table of Contents
- [Getting Started](#getting-started)
- [Development](#development)
- [Usage](#usage)

## Getting Started
with the help of this package you can add a laravel bot to your channel and send your Notifications from Your laravel application to your telegram channel .
This Pacakge allows your telegram bot send data from the events of your laravel application to your telegram channel or group .
## Development

1-You Need To Create a Bot on Telegram BotFather .

2-After that You recive a Token Which You place it In the `config/services.php` in config folder
```
 'telegram-bot-api' => [
        'token' => env('bot_token','bot1161950534:AAHTde5Cwt1fvk8oExMOOZLwLR-U5__BtcI'),
        'base_uri' => env('base_uri','https://api.telegram.org/'),
        'chat_id' => env('chat_id','-1001269391527'),
        'parse_mode' => env('parse_mode','html'),
    ],
```
for the `chat_id` you can add the add the `@get_id_bot` to your channel and it will give you the channel or group id and place it in `services.php`.

## Usage

Using this package is simple you just Call the `Telegram` and the methods which are all in the documentation in this link below :
```
https://core.telegram.org/bots/api
```
so the simple text message to group would be like :
```
use TelegramBot\Telegram; // it will be automatically added if not do it maniually  

Telegram::sendMessage($message);
```
the parameters send to the function would be all the same as documenation for the required or optional parameters .
 #Other Examples :
 ```
Telegram::sendPhoto($photo,$caption);
Telegram::sendVideo($video,$caption);
Telegram::sendLocation($lat,$long);
Telegram::sendAudio($audio,$caption);
Telegram::sendDocument($document,$caption);
Telegram::sendAnimation($animation,$caption);
Telegram::sendContact($phone_number,$first_name);
Telegram::getChatMembersCount();
 ```

# The documentation Will be Updated Soon.
