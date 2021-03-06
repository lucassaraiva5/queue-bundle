<?php

namespace lucassaraiva5\QueueBundle\Service;

use SymfonyBundles\RedisBundle\Redis\Client;

class Queue implements QueueInterface
{
    /**
     * @var string
     */
    private $name;

    private $storage;

    public function __construct(Client $storage, string $name)
    {
        $this->name = $name;
        $this->setStorage($storage);
    }


    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setStorage(Client $storage)
    {
        $this->storage = $storage;
    }

    /**
     * {@inheritdoc}
     */
    public function pop()
    {
        return $this->storage->pop($this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function push($value)
    {
        $this->storage->push($this->name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->storage->count($this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function first()
    {
        $list = $this->storage->lrange($this->name, 0, -1);

        if(count($list) > 0) {
            return $list[0];
        }

        return null;
    }
}
