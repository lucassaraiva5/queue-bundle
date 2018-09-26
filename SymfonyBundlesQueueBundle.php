<?php

namespace lucassaraiva5\QueueBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use lucassaraiva5\BundleDependency\BundleDependency;
use lucassaraiva5\BundleDependency\BundleDependencyInterface;

class SymfonyBundlesQueueBundle extends Bundle implements BundleDependencyInterface
{
    use BundleDependency;

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new DependencyInjection\QueueExtension();
    }

    /**
     * {@inheritdoc}
     */
    public function getBundleDependencies()
    {
        return [
            \SymfonyBundles\RedisBundle\SymfonyBundlesRedisBundle::class,
        ];
    }
}
