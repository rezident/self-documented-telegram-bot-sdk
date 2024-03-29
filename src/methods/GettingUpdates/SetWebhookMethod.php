<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update
 * for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized
 * [Update](https://core.telegram.org/bots/api#update). In case of an unsuccessful request, we will give up after a
 * reasonable amount of attempts. Returns *True* on success.
 *
 * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter
 * *secret\_token*. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret
 * token as content.
 *
 * > **Notes**
 *
 * > **1.** You will not be able to receive updates using [getUpdates](https://core.telegram.org/bots/api#getupdates)
 * for as long as an outgoing webhook is set up.
 *
 * > **2.** To use a self-signed certificate, you need to upload your
 * [public key certificate](https://core.telegram.org/bots/self-signed) using *certificate* parameter. Please upload as
 * InputFile, sending a String will not work.
 *
 * > **3.** Ports currently supported *for webhooks*: **443, 80, 88, 8443**.
 *
 * >
 *
 * > If you're having any trouble setting up webhooks, please check out this
 * [amazing guide to webhooks](https://core.telegram.org/bots/webhooks).
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setwebhook
 */
class SetWebhookMethod implements ToArrayInterface
{
    private ?InputFile $certificate = null;

    private ?string $ipAddress = null;

    private ?int $maxConnections = null;

    private ?ArrayOfString $allowedUpdates = null;

    private ?bool $dropPendingUpdates = null;

    private ?string $secretToken = null;

    private function __construct(private string $url)
    {
    }

    /**
     * @param string $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
     */
    public static function new(string $url): self
    {
        return new self($url);
    }

    /**
     * Upload your public key certificate so that the root certificate in use can be checked. See our
     * [self-signed guide](https://core.telegram.org/bots/self-signed) for details.
     */
    public function certificate(?InputFile $certificate): self
    {
        $this->certificate = $certificate;
        return $this;
    }

    /**
     * The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
     */
    public function ipAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults
     * to *40*. Use lower values to limit the load on your bot's server, and higher values to increase your bot's
     * throughput.
     */
    public function maxConnections(?int $maxConnections): self
    {
        $this->maxConnections = $maxConnections;
        return $this;
    }

    /**
     * A JSON-serialized list of the update types you want your bot to receive. For example, specify
     * \[“message”, “edited\_channel\_post”, “callback\_query”\] to only receive updates of these types. See
     * [Update](https://core.telegram.org/bots/api#update) for a complete list of available update types. Specify an
     * empty list to receive all update types except *chat\_member* (default). If not specified, the previous setting
     * will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted
     * updates may be received for a short period of time.
     */
    public function allowedUpdates(?ArrayOfString $allowedUpdates): self
    {
        $this->allowedUpdates = $allowedUpdates;
        return $this;
    }

    /**
     * Pass *True* to drop all pending updates
     */
    public function dropPendingUpdates(?bool $dropPendingUpdates): self
    {
        $this->dropPendingUpdates = $dropPendingUpdates;
        return $this;
    }

    /**
     * A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256
     * characters. Only characters `A-Z`, `a-z`, `0-9`, `_` and `-` are allowed. The header is useful to ensure that
     * the request comes from a webhook set by you.
     */
    public function secretToken(?string $secretToken): self
    {
        $this->secretToken = $secretToken;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'url' => $this->url,
            'certificate' => $this->certificate,
            'ip_address' => $this->ipAddress,
            'max_connections' => $this->maxConnections,
            'allowed_updates' => $this->allowedUpdates,
            'drop_pending_updates' => $this->dropPendingUpdates,
            'secret_token' => $this->secretToken,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
