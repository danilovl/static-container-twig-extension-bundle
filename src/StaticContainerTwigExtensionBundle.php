<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle;

use Danilovl\StaticContainerTwigExtensionBundle\DependencyInjection\StaticContainerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class StaticContainerTwigExtensionBundle extends Bundle
{
    /**
     * @return StaticContainerExtension
     */
    public function getContainerExtension(): StaticContainerExtension
    {
        return new StaticContainerExtension;
    }
}
