<?php

namespace BrokerAction\DTO\TransactionMessage\MessageComponent;

class Path
{
    /** @var string */
    private $type;

    /** @var string */
    private $method;

    /** @var string */
    private $action;

    /** @var string */
    private $direction;

    private const DELIMITER = '.';

    public function __construct(string $type, string $method, string $direction, string $action)
    {
        $this->type = $type;
        $this->method = $method;
        $this->action = $action;
        $this->direction = $direction;
    }

    /**
     * @param string $action
     * @return Path
     */
    public function setAction(string $action): Path
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @param string $method
     * @return Path
     */
    public function setMethod(string $method): Path
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $type
     * @return Path
     */
    public function setType(string $type): Path
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     * @return Path
     */
    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function fullPath(): string
    {
        return $this->type .
            self::DELIMITER . $this->method .
            self::DELIMITER . $this->direction .
            self::DELIMITER . $this->action;
    }

    public static function fromString(string $path): self
    {
        $pathParts = explode(self::DELIMITER, $path);
        return new static($pathParts[0], $pathParts[1], $pathParts[2], $pathParts[3]);
    }
}
