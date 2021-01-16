<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Danilovl\StaticContainerTwigExtensionBundle\Services\StaticContainerService;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set('danilovl.static_container', StaticContainerService::class)
        ->public()
        ->alias(StaticContainerService::class, 'danilovl.static_container');
};