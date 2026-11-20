<?php

declare(strict_types=1);

namespace AlexandreBulete\DddDoctrineBundle\Tests;

use AlexandreBulete\DddDoctrineBundle\DddDoctrineBundle;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

final class DddDoctrineBundleTest extends TestCase
{
    #[Test]
    public function itLoadsItsServiceDefinitions(): void
    {
        $extension = (new DddDoctrineBundle())->getContainerExtension();
        self::assertInstanceOf(ExtensionInterface::class, $extension);

        $container = new ContainerBuilder();
        $container->setParameter('kernel.environment', 'test');
        $container->setParameter('kernel.build_dir', sys_get_temp_dir());
        $extension->load([], $container);

        $loaded = array_map(strval(...), $container->getResources());
        self::assertNotEmpty(array_filter($loaded, static fn (string $r): bool => str_ends_with($r, 'Resources/config/services.php')));
    }
}
