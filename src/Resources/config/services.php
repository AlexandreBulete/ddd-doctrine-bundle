<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    // DoctrineRepository and DoctrinePaginator are abstract/final
    // They are meant to be extended/used by application repositories
    // No services to register here, but this file is kept for future extensions
};

