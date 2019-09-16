<?php

namespace BrokerAction\Framework;

use BrokerAction\DTO\ActionResponse;

interface ActionInterface
{
    public function run($data): ActionResponse;
}
