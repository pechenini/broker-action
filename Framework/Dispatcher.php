<?php

namespace BrokerAction\Framework;

use BrokerAction\DTO\TransactionMessage\MessageComponent\Payload;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Dispatcher
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function dispatch(string $actionClass, Payload $data)
    {
        /** @var ActionInterface|null $action */
        $action = $this->container->get($actionClass);
        if (!$action) {
            throw new \Exception("Action $actionClass was not found");
        }
        if (!($action instanceof ActionInterface)) {
            throw new \Exception("Class $actionClass does not implement ActionInterface");
        }

        return $action->run($data->getData());
    }
}