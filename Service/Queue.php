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

    public function __construct(Client $storage)
    {
        $this->name = "default";
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
}
