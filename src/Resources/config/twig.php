<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Danilovl\StaticContainerTwigExtensionBundle\Twig\StaticContainerExtension;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set('danilovl.static_container.twig_extension', StaticContainerExtension::class)
        ->args([
            service('danilovl.static_container'),
        ])
        ->private()
        ->tag('twig.extension')
        ->alias(StaticContainerExtension::class, 'danilovl.static_container.twig_extension');
};