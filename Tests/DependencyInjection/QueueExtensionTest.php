<?php

namespace lucassaraiva5\QueueBundle\Tests\DependencyInjection;

use lucassaraiva5\QueueBundle\Tests\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use lucassaraiva5\QueueBundle\DependencyInjection\QueueExtension;

class QueueExtensionTest extends TestCase
{
    public function testHasServices()
    {
        $extension = new QueueExtension();
        $container = new ContainerBuilder();

        $this->assertInstanceOf(Extension::class, $extension);

        $extension->load([], $container);

        $services = ['sb_queue', 'sb_queue.storage'];

        foreach ($services as $service) {
            $this->assertTrue($container->has($service));
        }
    }

    public function testInvalidStorageSection()
    {
        $extension = new QueueExtension();
        $container = new ContainerBuilder();

        $this->expectException(\InvalidArgumentException::class);

        $extension->load(['sb_queue' => [
            'service' => [
                'storage' => 'mongo',
                ],
            ],
        ], $container);
    }

    public function testAlias()
    {
        $extension = new QueueExtension();

        $this->assertStringEndsWith('queue', $extension->getAlias());
    }
}
