<?php


namespace App\Adapter;


use App\Factory\HandlerFactory;
use App\Infrastructure\Interfaces\ToArrayInterface;
use App\Message\MessageInterface;

/**
 * Class QueueAdapter
 * @package App\Adapter
 */
class QueueAdapter
{
    /**
     * @var HandlerFactory
     */
    private $factory;

    /**
     * QueueAdapter constructor.
     * @param HandlerFactory $factory
     */
    public function __construct(HandlerFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param ToArrayInterface $values
     * @return string
     * @throws \JsonException
     */
    public function set(ToArrayInterface $values): string
    {
        return json_encode([
            'message' => get_class($values),
            'values' => $values->toArray(),
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $data
     * @return float|int
     * @throws \Exception
     */
    public function get(string $data)
    {
        $parsedData = json_decode($data);
        /**
         * @var $message MessageInterface
         */
        $message = new $parsedData->message(...(array)$parsedData->values);
        $handler = $this->factory->getForMessage($message);
        return $message->getString() . ' = ' . $handler->handle();
    }
}