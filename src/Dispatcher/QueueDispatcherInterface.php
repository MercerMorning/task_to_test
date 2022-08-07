<?php


namespace App\Dispatcher;


use App\Infrastructure\Interfaces\ToArrayInterface;

/**
 * Interface QueueDispatcherInterface
 * @package App\Dispatcher
 */
interface QueueDispatcherInterface
{
    /**
     * @param ToArrayInterface $message
     * @return mixed
     */
    public function dispatch(ToArrayInterface $message);

    /**
     * @param $queueName
     * @return mixed
     */
    public function consume($queueName);
}