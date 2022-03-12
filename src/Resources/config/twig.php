<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Danilovl\StaticContainerTwigExtensionBundle\Twig\StaticContainerExtension;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set(StaticContainerExtension::class, StaticContainerExtension::class)
        ->autowire()
        ->private()
        ->tag('twig.extension');
};
