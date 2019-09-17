<?php

namespace BrokerAction\Framework;

use BrokerAction\DTO\TransactionMessage\TransactionMessageDTO;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class Router
{
    /** @var Dispatcher */
    private $dispatcher;

    /** @var ContainerBagInterface */
    private $params;

    public function __construct(
        Dispatcher $dispatcher,
        ContainerBagInterface $params
    ) {
        $this->dispatcher = $dispatcher;
        $this->params = $params;
    }

    public function route(TransactionMessageDTO $message)
    {
        $path = $message->path->fullPath();
        $topicRouting = $this->params->get('broker_action');
        $mapping = $topicRouting[0]['mapping'];
        $mapping = array_fill_keys(array_column($mapping, 'path'), array_values($mapping));

        $className = isset($mapping[$path]) ? $mapping[$path] : null;
        if (!$className) {
            throw new \Exception("Action was not found for $path");
        }

        $payload = $this->dispatcher->dispatch($className, $message->payload);
        return $payload;
    }
}
