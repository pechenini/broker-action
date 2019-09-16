<?php

namespace BrokerAction\DTO;

class ActionResponse
{
    private $data;
    private $errors;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return count($this->errors) > 0;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return ActionResponse
     */
    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return Error|null
     */
    public function getError(): ?Error
    {
        return isset($this->errors[0]) ? $this->errors[0] : null;
    }

    /**
     * @param Error $error
     * @return ActionResponse
     */
    public function setError(Error $error): self
    {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * @param mixed $data
     * @return ActionResponse
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }
}
