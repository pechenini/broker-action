<?php

namespace BrokerAction\DTO\TransactionMessage;

use BrokerAction\DTO\TransactionMessage\MessageComponent\Path;
use BrokerAction\DTO\TransactionMessage\MessageComponent\Payload;

class TransactionMessageDTO
{
    /** @var Path */
    public $path;

    /** @var Payload */
    public $payload;

    /**
     * TransactionMessageDTO constructor.
     * @param Path $path
     * @param Payload $payload
     */
    public function __construct(Path $path, Payload $payload)
    {
        $this->path = $path;
        $this->payload = $payload;
    }

    public function toJson()
    {
        return json_encode([
            'path' => $this->path->fullPath(),
            'payload' => $this->payload->getData()
        ]);
    }

    public static function fromJson(string $message)
    {
        $data = json_decode($message, true);
        $path = Path::fromString($data['path']);
        $payload = new Payload($data['payload']);
        return new static($path, $payload);
    }
}
