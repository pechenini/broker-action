<?php

namespace BrokerAction\DTO\TransactionMessage\MessageComponent;

class Payload
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return Payload
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }
}