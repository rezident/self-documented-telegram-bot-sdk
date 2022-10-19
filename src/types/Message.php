<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfPhotoSize;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfUser;
use Rezident\SelfDocumentedTelegramBotSdk\types\Games\Game;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\Invoice;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\SuccessfulPayment;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\Sticker;
use Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport\PassportData;

/**
 * This object represents a message.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#message
 */
class Message implements FromArrayInterface, ToArrayInterface
{
    private ?User $from = null;

    private ?Chat $senderChat = null;

    private ?User $forwardFrom = null;

    private ?Chat $forwardFromChat = null;

    private ?int $forwardFromMessageId = null;

    private ?string $forwardSignature = null;

    private ?string $forwardSenderName = null;

    private ?int $forwardDate = null;

    private ?bool $isAutomaticForward = null;

    private ?Message $replyToMessage = null;

    private ?User $viaBot = null;

    private ?int $editDate = null;

    private ?bool $hasProtectedContent = null;

    private ?string $mediaGroupId = null;

    private ?string $authorSignature = null;

    private ?string $text = null;

    private ?ArrayOfMessageEntity $entities = null;

    private ?Animation $animation = null;

    private ?Audio $audio = null;

    private ?Document $document = null;

    private ?ArrayOfPhotoSize $photo = null;

    private ?Sticker $sticker = null;

    private ?Video $video = null;

    private ?VideoNote $videoNote = null;

    private ?Voice $voice = null;

    private ?string $caption = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?Contact $contact = null;

    private ?Dice $dice = null;

    private ?Game $game = null;

    private ?Poll $poll = null;

    private ?Venue $venue = null;

    private ?Location $location = null;

    private ?ArrayOfUser $newChatMembers = null;

    private ?User $leftChatMember = null;

    private ?string $newChatTitle = null;

    private ?ArrayOfPhotoSize $newChatPhoto = null;

    private ?bool $deleteChatPhoto = null;

    private ?bool $groupChatCreated = null;

    private ?bool $supergroupChatCreated = null;

    private ?bool $channelChatCreated = null;

    private ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged = null;

    private ?int $migrateToChatId = null;

    private ?int $migrateFromChatId = null;

    private ?Message $pinnedMessage = null;

    private ?Invoice $invoice = null;

    private ?SuccessfulPayment $successfulPayment = null;

    private ?string $connectedWebsite = null;

    private ?PassportData $passportData = null;

    private ?ProximityAlertTriggered $proximityAlertTriggered = null;

    private ?VideoChatScheduled $videoChatScheduled = null;

    private ?VideoChatStarted $videoChatStarted = null;

    private ?VideoChatEnded $videoChatEnded = null;

    private ?VideoChatParticipantsInvited $videoChatParticipantsInvited = null;

    private ?WebAppData $webAppData = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private int $messageId, private int $date, private Chat $chat)
    {
    }

    /**
     * @param int $messageId Unique message identifier inside this chat
     * @param int $date Date the message was sent in Unix time
     * @param Chat $chat Conversation the message belongs to
     */
    public static function new(int $messageId, int $date, Chat $chat): self
    {
        return new self($messageId, $date, $chat);
    }

    /**
     * Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a
     * fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     */
    public function from(?User $from): self
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the
     * supergroup itself for messages from anonymous group administrators, the linked channel for messages
     * automatically forwarded to the discussion group. For backward compatibility, the field *from* contains a fake
     * sender user in non-channel chats, if the message was sent on behalf of a chat.
     */
    public function senderChat(?Chat $senderChat): self
    {
        $this->senderChat = $senderChat;
        return $this;
    }

    /**
     * For forwarded messages, sender of the original message
     */
    public function forwardFrom(?User $forwardFrom): self
    {
        $this->forwardFrom = $forwardFrom;
        return $this;
    }

    /**
     * For messages forwarded from channels or from anonymous administrators, information about the original sender
     * chat
     */
    public function forwardFromChat(?Chat $forwardFromChat): self
    {
        $this->forwardFromChat = $forwardFromChat;
        return $this;
    }

    /**
     * For messages forwarded from channels, identifier of the original message in the channel
     */
    public function forwardFromMessageId(?int $forwardFromMessageId): self
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
        return $this;
    }

    /**
     * For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of
     * the message sender if present
     */
    public function forwardSignature(?string $forwardSignature): self
    {
        $this->forwardSignature = $forwardSignature;
        return $this;
    }

    /**
     * Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded
     * messages
     */
    public function forwardSenderName(?string $forwardSenderName): self
    {
        $this->forwardSenderName = $forwardSenderName;
        return $this;
    }

    /**
     * For forwarded messages, date the original message was sent in Unix time
     */
    public function forwardDate(?int $forwardDate): self
    {
        $this->forwardDate = $forwardDate;
        return $this;
    }

    /**
     * *True*, if the message is a channel post that was automatically forwarded to the connected discussion group
     */
    public function isAutomaticForward(?bool $isAutomaticForward): self
    {
        $this->isAutomaticForward = $isAutomaticForward;
        return $this;
    }

    /**
     * For replies, the original message. Note that the Message object in this field will not contain further
     * *reply\_to\_message* fields even if it itself is a reply.
     */
    public function replyToMessage(?Message $replyToMessage): self
    {
        $this->replyToMessage = $replyToMessage;
        return $this;
    }

    /**
     * Bot through which the message was sent
     */
    public function viaBot(?User $viaBot): self
    {
        $this->viaBot = $viaBot;
        return $this;
    }

    /**
     * Date the message was last edited in Unix time
     */
    public function editDate(?int $editDate): self
    {
        $this->editDate = $editDate;
        return $this;
    }

    /**
     * *True*, if the message can't be forwarded
     */
    public function hasProtectedContent(?bool $hasProtectedContent): self
    {
        $this->hasProtectedContent = $hasProtectedContent;
        return $this;
    }

    /**
     * The unique identifier of a media message group this message belongs to
     */
    public function mediaGroupId(?string $mediaGroupId): self
    {
        $this->mediaGroupId = $mediaGroupId;
        return $this;
    }

    /**
     * Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     */
    public function authorSignature(?string $authorSignature): self
    {
        $this->authorSignature = $authorSignature;
        return $this;
    }

    /**
     * For text messages, the actual UTF-8 text of the message
     */
    public function text(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public function entities(?ArrayOfMessageEntity $entities): self
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * Message is an animation, information about the animation. For backward compatibility, when this field is set,
     * the *document* field will also be set
     */
    public function animation(?Animation $animation): self
    {
        $this->animation = $animation;
        return $this;
    }

    /**
     * Message is an audio file, information about the file
     */
    public function audio(?Audio $audio): self
    {
        $this->audio = $audio;
        return $this;
    }

    /**
     * Message is a general file, information about the file
     */
    public function document(?Document $document): self
    {
        $this->document = $document;
        return $this;
    }

    /**
     * Message is a photo, available sizes of the photo
     */
    public function photo(?ArrayOfPhotoSize $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Message is a sticker, information about the sticker
     */
    public function sticker(?Sticker $sticker): self
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * Message is a video, information about the video
     */
    public function video(?Video $video): self
    {
        $this->video = $video;
        return $this;
    }

    /**
     * Message is a [video note](https://telegram.org/blog/video-messages-and-telescope), information about the video
     * message
     */
    public function videoNote(?VideoNote $videoNote): self
    {
        $this->videoNote = $videoNote;
        return $this;
    }

    /**
     * Message is a voice message, information about the file
     */
    public function voice(?Voice $voice): self
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * Caption for the animation, audio, document, photo, video or voice
     */
    public function caption(?string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the
     * caption
     */
    public function captionEntities(?ArrayOfMessageEntity $captionEntities): self
    {
        $this->captionEntities = $captionEntities;
        return $this;
    }

    /**
     * Message is a shared contact, information about the contact
     */
    public function contact(?Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Message is a dice with random value
     */
    public function dice(?Dice $dice): self
    {
        $this->dice = $dice;
        return $this;
    }

    /**
     * Message is a game, information about the game. [More about games »](https://core.telegram.org/bots/api#games)
     */
    public function game(?Game $game): self
    {
        $this->game = $game;
        return $this;
    }

    /**
     * Message is a native poll, information about the poll
     */
    public function poll(?Poll $poll): self
    {
        $this->poll = $poll;
        return $this;
    }

    /**
     * Message is a venue, information about the venue. For backward compatibility, when this field is set, the
     * *location* field will also be set
     */
    public function venue(?Venue $venue): self
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * Message is a shared location, information about the location
     */
    public function location(?Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * New members that were added to the group or supergroup and information about them (the bot itself may be one of
     * these members)
     */
    public function newChatMembers(?ArrayOfUser $newChatMembers): self
    {
        $this->newChatMembers = $newChatMembers;
        return $this;
    }

    /**
     * A member was removed from the group, information about them (this member may be the bot itself)
     */
    public function leftChatMember(?User $leftChatMember): self
    {
        $this->leftChatMember = $leftChatMember;
        return $this;
    }

    /**
     * A chat title was changed to this value
     */
    public function newChatTitle(?string $newChatTitle): self
    {
        $this->newChatTitle = $newChatTitle;
        return $this;
    }

    /**
     * A chat photo was change to this value
     */
    public function newChatPhoto(?ArrayOfPhotoSize $newChatPhoto): self
    {
        $this->newChatPhoto = $newChatPhoto;
        return $this;
    }

    /**
     * Service message: the chat photo was deleted
     */
    public function deleteChatPhoto(?bool $deleteChatPhoto): self
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
        return $this;
    }

    /**
     * Service message: the group has been created
     */
    public function groupChatCreated(?bool $groupChatCreated): self
    {
        $this->groupChatCreated = $groupChatCreated;
        return $this;
    }

    /**
     * Service message: the supergroup has been created. This field can't be received in a message coming through
     * updates, because bot can't be a member of a supergroup when it is created. It can only be found in
     * reply\_to\_message if someone replies to a very first message in a directly created supergroup.
     */
    public function supergroupChatCreated(?bool $supergroupChatCreated): self
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
        return $this;
    }

    /**
     * Service message: the channel has been created. This field can't be received in a message coming through updates,
     * because bot can't be a member of a channel when it is created. It can only be found in reply\_to\_message if
     * someone replies to a very first message in a channel.
     */
    public function channelChatCreated(?bool $channelChatCreated): self
    {
        $this->channelChatCreated = $channelChatCreated;
        return $this;
    }

    /**
     * Service message: auto-delete timer settings changed in the chat
     */
    public function messageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged): self
    {
        $this->messageAutoDeleteTimerChanged = $messageAutoDeleteTimerChanged;
        return $this;
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function migrateToChatId(?int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;
        return $this;
    }

    /**
     * The supergroup has been migrated from a group with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function migrateFromChatId(?int $migrateFromChatId): self
    {
        $this->migrateFromChatId = $migrateFromChatId;
        return $this;
    }

    /**
     * Specified message was pinned. Note that the Message object in this field will not contain further
     * *reply\_to\_message* fields even if it is itself a reply.
     */
    public function pinnedMessage(?Message $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;
        return $this;
    }

    /**
     * Message is an invoice for a [payment](https://core.telegram.org/bots/api#payments), information about the
     * invoice. [More about payments »](https://core.telegram.org/bots/api#payments)
     */
    public function invoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * Message is a service message about a successful payment, information about the payment.
     * [More about payments »](https://core.telegram.org/bots/api#payments)
     */
    public function successfulPayment(?SuccessfulPayment $successfulPayment): self
    {
        $this->successfulPayment = $successfulPayment;
        return $this;
    }

    /**
     * The domain name of the website on which the user has logged in.
     * [More about Telegram Login »](https://core.telegram.org/widgets/login)
     */
    public function connectedWebsite(?string $connectedWebsite): self
    {
        $this->connectedWebsite = $connectedWebsite;
        return $this;
    }

    /**
     * Telegram Passport data
     */
    public function passportData(?PassportData $passportData): self
    {
        $this->passportData = $passportData;
        return $this;
    }

    /**
     * Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     */
    public function proximityAlertTriggered(?ProximityAlertTriggered $proximityAlertTriggered): self
    {
        $this->proximityAlertTriggered = $proximityAlertTriggered;
        return $this;
    }

    /**
     * Service message: video chat scheduled
     */
    public function videoChatScheduled(?VideoChatScheduled $videoChatScheduled): self
    {
        $this->videoChatScheduled = $videoChatScheduled;
        return $this;
    }

    /**
     * Service message: video chat started
     */
    public function videoChatStarted(?VideoChatStarted $videoChatStarted): self
    {
        $this->videoChatStarted = $videoChatStarted;
        return $this;
    }

    /**
     * Service message: video chat ended
     */
    public function videoChatEnded(?VideoChatEnded $videoChatEnded): self
    {
        $this->videoChatEnded = $videoChatEnded;
        return $this;
    }

    /**
     * Service message: new participants invited to a video chat
     */
    public function videoChatParticipantsInvited(?VideoChatParticipantsInvited $videoChatParticipantsInvited): self
    {
        $this->videoChatParticipantsInvited = $videoChatParticipantsInvited;
        return $this;
    }

    /**
     * Service message: data sent by a Web App
     */
    public function webAppData(?WebAppData $webAppData): self
    {
        $this->webAppData = $webAppData;
        return $this;
    }

    /**
     * Inline keyboard attached to the message. `login_url` buttons are represented as ordinary `url` buttons.
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    /**
     * Unique message identifier inside this chat
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a
     * fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the
     * supergroup itself for messages from anonymous group administrators, the linked channel for messages
     * automatically forwarded to the discussion group. For backward compatibility, the field *from* contains a fake
     * sender user in non-channel chats, if the message was sent on behalf of a chat.
     */
    public function getSenderChat(): ?Chat
    {
        return $this->senderChat;
    }

    /**
     * Date the message was sent in Unix time
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * Conversation the message belongs to
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * For forwarded messages, sender of the original message
     */
    public function getForwardFrom(): ?User
    {
        return $this->forwardFrom;
    }

    /**
     * For messages forwarded from channels or from anonymous administrators, information about the original sender
     * chat
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * For messages forwarded from channels, identifier of the original message in the channel
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of
     * the message sender if present
     */
    public function getForwardSignature(): ?string
    {
        return $this->forwardSignature;
    }

    /**
     * Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded
     * messages
     */
    public function getForwardSenderName(): ?string
    {
        return $this->forwardSenderName;
    }

    /**
     * For forwarded messages, date the original message was sent in Unix time
     */
    public function getForwardDate(): ?int
    {
        return $this->forwardDate;
    }

    /**
     * *True*, if the message is a channel post that was automatically forwarded to the connected discussion group
     */
    public function getIsAutomaticForward(): ?bool
    {
        return $this->isAutomaticForward;
    }

    /**
     * For replies, the original message. Note that the Message object in this field will not contain further
     * *reply\_to\_message* fields even if it itself is a reply.
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * Bot through which the message was sent
     */
    public function getViaBot(): ?User
    {
        return $this->viaBot;
    }

    /**
     * Date the message was last edited in Unix time
     */
    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    /**
     * *True*, if the message can't be forwarded
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->hasProtectedContent;
    }

    /**
     * The unique identifier of a media message group this message belongs to
     */
    public function getMediaGroupId(): ?string
    {
        return $this->mediaGroupId;
    }

    /**
     * Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    /**
     * For text messages, the actual UTF-8 text of the message
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public function getEntities(): ?ArrayOfMessageEntity
    {
        return $this->entities;
    }

    /**
     * Message is an animation, information about the animation. For backward compatibility, when this field is set,
     * the *document* field will also be set
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * Message is an audio file, information about the file
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * Message is a general file, information about the file
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * Message is a photo, available sizes of the photo
     */
    public function getPhoto(): ?ArrayOfPhotoSize
    {
        return $this->photo;
    }

    /**
     * Message is a sticker, information about the sticker
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * Message is a video, information about the video
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * Message is a [video note](https://telegram.org/blog/video-messages-and-telescope), information about the video
     * message
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * Message is a voice message, information about the file
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * Caption for the animation, audio, document, photo, video or voice
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the
     * caption
     */
    public function getCaptionEntities(): ?ArrayOfMessageEntity
    {
        return $this->captionEntities;
    }

    /**
     * Message is a shared contact, information about the contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Message is a dice with random value
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * Message is a game, information about the game. [More about games »](https://core.telegram.org/bots/api#games)
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * Message is a native poll, information about the poll
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * Message is a venue, information about the venue. For backward compatibility, when this field is set, the
     * *location* field will also be set
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * Message is a shared location, information about the location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * New members that were added to the group or supergroup and information about them (the bot itself may be one of
     * these members)
     */
    public function getNewChatMembers(): ?ArrayOfUser
    {
        return $this->newChatMembers;
    }

    /**
     * A member was removed from the group, information about them (this member may be the bot itself)
     */
    public function getLeftChatMember(): ?User
    {
        return $this->leftChatMember;
    }

    /**
     * A chat title was changed to this value
     */
    public function getNewChatTitle(): ?string
    {
        return $this->newChatTitle;
    }

    /**
     * A chat photo was change to this value
     */
    public function getNewChatPhoto(): ?ArrayOfPhotoSize
    {
        return $this->newChatPhoto;
    }

    /**
     * Service message: the chat photo was deleted
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * Service message: the group has been created
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->groupChatCreated;
    }

    /**
     * Service message: the supergroup has been created. This field can't be received in a message coming through
     * updates, because bot can't be a member of a supergroup when it is created. It can only be found in
     * reply\_to\_message if someone replies to a very first message in a directly created supergroup.
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * Service message: the channel has been created. This field can't be received in a message coming through updates,
     * because bot can't be a member of a channel when it is created. It can only be found in reply\_to\_message if
     * someone replies to a very first message in a channel.
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channelChatCreated;
    }

    /**
     * Service message: auto-delete timer settings changed in the chat
     */
    public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
    {
        return $this->messageAutoDeleteTimerChanged;
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * The supergroup has been migrated from a group with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrateFromChatId;
    }

    /**
     * Specified message was pinned. Note that the Message object in this field will not contain further
     * *reply\_to\_message* fields even if it is itself a reply.
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * Message is an invoice for a [payment](https://core.telegram.org/bots/api#payments), information about the
     * invoice. [More about payments »](https://core.telegram.org/bots/api#payments)
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * Message is a service message about a successful payment, information about the payment.
     * [More about payments »](https://core.telegram.org/bots/api#payments)
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * The domain name of the website on which the user has logged in.
     * [More about Telegram Login »](https://core.telegram.org/widgets/login)
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connectedWebsite;
    }

    /**
     * Telegram Passport data
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passportData;
    }

    /**
     * Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     */
    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximityAlertTriggered;
    }

    /**
     * Service message: video chat scheduled
     */
    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->videoChatScheduled;
    }

    /**
     * Service message: video chat started
     */
    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->videoChatStarted;
    }

    /**
     * Service message: video chat ended
     */
    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->videoChatEnded;
    }

    /**
     * Service message: new participants invited to a video chat
     */
    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->videoChatParticipantsInvited;
    }

    /**
     * Service message: data sent by a Web App
     */
    public function getWebAppData(): ?WebAppData
    {
        return $this->webAppData;
    }

    /**
     * Inline keyboard attached to the message. `login_url` buttons are represented as ordinary `url` buttons.
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['message_id'], $array['date'], Chat::fromArray($array['chat']));

        $instance->from = User::fromArray($array['from'] ?? null);
        $instance->senderChat = Chat::fromArray($array['sender_chat'] ?? null);
        $instance->forwardFrom = User::fromArray($array['forward_from'] ?? null);
        $instance->forwardFromChat = Chat::fromArray($array['forward_from_chat'] ?? null);
        $instance->forwardFromMessageId = $array['forward_from_message_id'] ?? null;
        $instance->forwardSignature = $array['forward_signature'] ?? null;
        $instance->forwardSenderName = $array['forward_sender_name'] ?? null;
        $instance->forwardDate = $array['forward_date'] ?? null;
        $instance->isAutomaticForward = $array['is_automatic_forward'] ?? null;
        $instance->replyToMessage = Message::fromArray($array['reply_to_message'] ?? null);
        $instance->viaBot = User::fromArray($array['via_bot'] ?? null);
        $instance->editDate = $array['edit_date'] ?? null;
        $instance->hasProtectedContent = $array['has_protected_content'] ?? null;
        $instance->mediaGroupId = $array['media_group_id'] ?? null;
        $instance->authorSignature = $array['author_signature'] ?? null;
        $instance->text = $array['text'] ?? null;
        $instance->entities = ArrayOfMessageEntity::fromArray($array['entities'] ?? null);
        $instance->animation = Animation::fromArray($array['animation'] ?? null);
        $instance->audio = Audio::fromArray($array['audio'] ?? null);
        $instance->document = Document::fromArray($array['document'] ?? null);
        $instance->photo = ArrayOfPhotoSize::fromArray($array['photo'] ?? null);
        $instance->sticker = Sticker::fromArray($array['sticker'] ?? null);
        $instance->video = Video::fromArray($array['video'] ?? null);
        $instance->videoNote = VideoNote::fromArray($array['video_note'] ?? null);
        $instance->voice = Voice::fromArray($array['voice'] ?? null);
        $instance->caption = $array['caption'] ?? null;
        $instance->captionEntities = ArrayOfMessageEntity::fromArray($array['caption_entities'] ?? null);
        $instance->contact = Contact::fromArray($array['contact'] ?? null);
        $instance->dice = Dice::fromArray($array['dice'] ?? null);
        $instance->game = Game::fromArray($array['game'] ?? null);
        $instance->poll = Poll::fromArray($array['poll'] ?? null);
        $instance->venue = Venue::fromArray($array['venue'] ?? null);
        $instance->location = Location::fromArray($array['location'] ?? null);
        $instance->newChatMembers = ArrayOfUser::fromArray($array['new_chat_members'] ?? null);
        $instance->leftChatMember = User::fromArray($array['left_chat_member'] ?? null);
        $instance->newChatTitle = $array['new_chat_title'] ?? null;
        $instance->newChatPhoto = ArrayOfPhotoSize::fromArray($array['new_chat_photo'] ?? null);
        $instance->deleteChatPhoto = $array['delete_chat_photo'] ?? null;
        $instance->groupChatCreated = $array['group_chat_created'] ?? null;
        $instance->supergroupChatCreated = $array['supergroup_chat_created'] ?? null;
        $instance->channelChatCreated = $array['channel_chat_created'] ?? null;
        $instance->messageAutoDeleteTimerChanged = MessageAutoDeleteTimerChanged::fromArray($array['message_auto_delete_timer_changed'] ?? null);
        $instance->migrateToChatId = $array['migrate_to_chat_id'] ?? null;
        $instance->migrateFromChatId = $array['migrate_from_chat_id'] ?? null;
        $instance->pinnedMessage = Message::fromArray($array['pinned_message'] ?? null);
        $instance->invoice = Invoice::fromArray($array['invoice'] ?? null);
        $instance->successfulPayment = SuccessfulPayment::fromArray($array['successful_payment'] ?? null);
        $instance->connectedWebsite = $array['connected_website'] ?? null;
        $instance->passportData = PassportData::fromArray($array['passport_data'] ?? null);
        $instance->proximityAlertTriggered = ProximityAlertTriggered::fromArray($array['proximity_alert_triggered'] ?? null);
        $instance->videoChatScheduled = VideoChatScheduled::fromArray($array['video_chat_scheduled'] ?? null);
        $instance->videoChatStarted = VideoChatStarted::fromArray($array['video_chat_started'] ?? null);
        $instance->videoChatEnded = VideoChatEnded::fromArray($array['video_chat_ended'] ?? null);
        $instance->videoChatParticipantsInvited = VideoChatParticipantsInvited::fromArray($array['video_chat_participants_invited'] ?? null);
        $instance->webAppData = WebAppData::fromArray($array['web_app_data'] ?? null);
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'message_id' => $this->messageId,
            'from' => $this->from,
            'sender_chat' => $this->senderChat,
            'date' => $this->date,
            'chat' => $this->chat,
            'forward_from' => $this->forwardFrom,
            'forward_from_chat' => $this->forwardFromChat,
            'forward_from_message_id' => $this->forwardFromMessageId,
            'forward_signature' => $this->forwardSignature,
            'forward_sender_name' => $this->forwardSenderName,
            'forward_date' => $this->forwardDate,
            'is_automatic_forward' => $this->isAutomaticForward,
            'reply_to_message' => $this->replyToMessage,
            'via_bot' => $this->viaBot,
            'edit_date' => $this->editDate,
            'has_protected_content' => $this->hasProtectedContent,
            'media_group_id' => $this->mediaGroupId,
            'author_signature' => $this->authorSignature,
            'text' => $this->text,
            'entities' => $this->entities,
            'animation' => $this->animation,
            'audio' => $this->audio,
            'document' => $this->document,
            'photo' => $this->photo,
            'sticker' => $this->sticker,
            'video' => $this->video,
            'video_note' => $this->videoNote,
            'voice' => $this->voice,
            'caption' => $this->caption,
            'caption_entities' => $this->captionEntities,
            'contact' => $this->contact,
            'dice' => $this->dice,
            'game' => $this->game,
            'poll' => $this->poll,
            'venue' => $this->venue,
            'location' => $this->location,
            'new_chat_members' => $this->newChatMembers,
            'left_chat_member' => $this->leftChatMember,
            'new_chat_title' => $this->newChatTitle,
            'new_chat_photo' => $this->newChatPhoto,
            'delete_chat_photo' => $this->deleteChatPhoto,
            'group_chat_created' => $this->groupChatCreated,
            'supergroup_chat_created' => $this->supergroupChatCreated,
            'channel_chat_created' => $this->channelChatCreated,
            'message_auto_delete_timer_changed' => $this->messageAutoDeleteTimerChanged,
            'migrate_to_chat_id' => $this->migrateToChatId,
            'migrate_from_chat_id' => $this->migrateFromChatId,
            'pinned_message' => $this->pinnedMessage,
            'invoice' => $this->invoice,
            'successful_payment' => $this->successfulPayment,
            'connected_website' => $this->connectedWebsite,
            'passport_data' => $this->passportData,
            'proximity_alert_triggered' => $this->proximityAlertTriggered,
            'video_chat_scheduled' => $this->videoChatScheduled,
            'video_chat_started' => $this->videoChatStarted,
            'video_chat_ended' => $this->videoChatEnded,
            'video_chat_participants_invited' => $this->videoChatParticipantsInvited,
            'web_app_data' => $this->webAppData,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
