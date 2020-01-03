<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Twig;

use Twig\TwigFunction;
use FinalWork\FinalWorkBundle\Services\{
    MenuService,
    SystemEventLinkGeneratorService
};
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Extension\AbstractExtension;

class StaticContainerExtension extends AbstractExtension
{
    /**
     * @var array
     */
    private $container = [];

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('static_container_create', [$this, 'create']),
            new TwigFunction('static_container_update', [$this, 'update']),
            new TwigFunction('static_container_get', [$this, 'get']),
            new TwigFunction('static_container_has', [$this, 'has']),
            new TwigFunction('static_container_remove', [$this, 'remove'])
        ];
    }

    /**
     * @param string $key
     * @param $value
     */
    public function create(string $key, $value = null): void
    {
        if ($this->has($key)) {
            return;
        }

        $this->container[$key] = $value;
    }

    /**
     * @param string $key
     * @param $value
     */
    public function update(string $key, $value): void
    {
        $this->container[$key] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->container[$key]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->container[$key];
    }

    /**
     * @param string $key
     */
    public function remove(string $key): void
    {
        unset($this->container[$key]);
    }
}
