<?php


namespace OpenRecipeDBServer\Cache\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Redis;


class RedisFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param                    $requestedName
     * @param array|null         $options
     * @return Redis
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ): Redis {
        $config = $container->get('Config')['redis'];
        $redis  = new Redis();
        $redis->connect($config['host'] ?? '127.0.0.1', $config['port'] ?? 6379);

        return $redis;
    }
}