# laravel-Telegram-Bot
with the help of this package you can add a laravel bot to your channel and send your Notifications from Your laravel application to your telegram channel .
This Pacakge allows your telegram bot send data from the events of your laravel application to your telegram channel or group .

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

#Usage
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


# The documentation Will be Updated Soon.
