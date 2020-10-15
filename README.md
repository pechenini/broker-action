# Broker Action Bundle
## Installation

Add bundle to config/bundles.php

```
BrokerAction\BrokerActionBundle::class => ['all' => true]
```

Create broker_action.yaml in config/packages folder

Example of broker_action.yaml:
```
broker_action:
  mapping:
      - { path: 'some.path', action: 'App\Actions\SomeAction' }
      - { path: 'some.path1', action: 'App\Actions\SomeAnotherAction' }
```
 
 ## Action creation
Create class that implements `BrokerAction\Framework\ActionInterface`.

Example:
```
use BrokerAction\DTO\ActionResponse;
use BrokerAction\DTO\Error;
use BrokerAction\Framework\ActionInterface;

class SomeAction implements ActionInterface
{
    public function run($data): ActionResponse
    {
        $response = new ActionResponse();
        try {
            echo $data;
            $response->setData($data);
        } catch (\Exception $exception) {
            $response->setError(new Error($exception->getMessage()));
        }

        return $response;
    }
}
```

## Find route and fire action

To fire action you should create `TransactionMessageDTO` object and pass it to `route` method of `BrokerAction\Framework\Router`.

Example:
```
use BrokerAction\Framework\Router;
use BrokerAction\DTO\TransactionMessage\TransactionMessageDTO;

class FooClass {
    
    private $router;
    
    public function (Router $router) {
        $this->router = $router;
    }
    
    public function bar() {
        $json = '{
                     "path": "some.path",
                     "payload": {
                         "acc_id": 1
                     }
                 }';
        $message = TransactionMessageDTO::fromJson($json);
        $reponse =$this->router->route($message);
    }
}
``` 
