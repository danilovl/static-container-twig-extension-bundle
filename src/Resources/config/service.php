<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Danilovl\StaticContainerTwigExtensionBundle\Interfaces\StaticContainerServiceInterface;
use Danilovl\StaticContainerTwigExtensionBundle\Service\StaticContainerService;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set(StaticContainerService::class, StaticContainerService::class)
        ->public()
        ->alias(StaticContainerServiceInterface::class, StaticContainerService::class);
};
