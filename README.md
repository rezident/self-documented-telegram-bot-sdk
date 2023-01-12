# Self-documented Telegram Bot Sdk 👌😎🤌

This is a simple Telegram Bot SDK written in PHP.

## Usage

### Getting Bot updates

```php
use Rezident\SelfDocumentedTelegramBotSdk\components\Executor;
use Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates\GetUpdatesMethod;

$executor = new Executor('8360528562:Eim2eitahSh3ohshi7zee2Hoh2gaewee6eV');
$updates = GetUpdatesMethod::new()->exec($executor);

foreach ($updates as $update) {
    echo $update->getMessage()->getText();
}
```

### Sending messages

```php
use Rezident\SelfDocumentedTelegramBotSdk\components\Executor;
use Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates\GetUpdatesMethod;

$executor = new Executor('8360528562:Eim2eitahSh3ohshi7zee2Hoh2gaewee6eV');
$sentMessage = SendMessageMethod::new(8376498, 'Hello my dear friend!')->exec($executor);
...
```