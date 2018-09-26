<?php

namespace lucassaraiva5\QueueBundle\Service\Storage;

use lucassaraiva5\RedisBundle\Service\ClientInterface;

class RedisStorage implements StorageInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function first($key)
    {
        return \unserialize($this->client->lpop($key));
    }

    /**
     * {@inheritdoc}
     */
    public function last($key)
    {
        return \unserialize($this->client->rpop($key));
    }

    /**
     * {@inheritdoc}
     */
    public function append($key, $value)
    {
        $this->client->rpush($key, \serialize($value));
    }

    /**
     * {@inheritdoc}
     */
    public function prepend($key, $value)
    {
        $this->client->lpush($key, \serialize($value));
    }

    /**
     * {@inheritdoc}
     */
    public function count($key)
    {
        return $this->client->llen($key);
    }
}
