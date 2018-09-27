<?php

namespace lucassaraiva5\QueueBundle\Service;

use SymfonyBundles\RedisBundle\Redis\Client;

interface QueueInterface
{
    /**
     * Sets the storage client.
     *
     * @param Storage\StorageInterface $storage
     */
    public function setStorage(Client $storage);

    /**
     * Sets the name of the queue list.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Gets the name of the queue list.
     *
     * @return string
     */
    public function getName();

    /**
     * Removes and returns the first element of the list.
     *
     * @return mixed
     */
    public function pop();

    /**
     * Append the value into the end of list.
     *
     * @param mixed $value Pushes value of the list.
     */
    public function push($value);

    /**
     * Count all elements in a list.
     *
     * @return int
     */
    public function count();
}
