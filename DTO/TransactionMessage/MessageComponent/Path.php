<?php

namespace BrokerAction\DTO\TransactionMessage\MessageComponent;

class Path
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Path
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }
}