<?php


namespace App\Dispatcher;

use App\Adapter\QueueAdapter;
use App\Infrastructure\Interfaces\ToArrayInterface;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

/**
 * Class QueueDispatcher
 * @package App\Dispatcher
 */
class QueueDispatcher implements QueueDispatcherInterface
{
    /**
     * @var \Predis\ClientInterface|\Redis|\RedisArray|\RedisCluster|\Symfony\Component\Cache\Traits\RedisClusterProxy|\Symfony\Component\Cache\Traits\RedisProxy
     */
    private $cache;
    /**
     * @var QueueAdapter
     */
    private $adapter;

    /**
     * QueueDispatcher constructor.
     * @param QueueAdapter $adapter
     */
    public function __construct(QueueAdapter $adapter)
    {
        $this->cache = RedisAdapter::createConnection(
            $_ENV['REDIS_CONNECTION']
        );
        $this->adapter = $adapter;
    }

    /**
     * @param ToArrayInterface $message
     * @throws \JsonException
     */
    public function dispatch(ToArrayInterface $message): void
    {
        $this->cache->lPush($message->getQueueName(), $this->adapter->set($message));
    }

    /**
     * @param $queueName
     * @return array
     * @throws \Exception
     */
    public function consume($queueName): array
    {
        $result = [];
        while ($last = $this->cache->lPop($queueName)) {
            $result[] = $this->adapter->get($last);
        }
        return $result;
    }
}