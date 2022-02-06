<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Twig;

use Danilovl\StaticContainerTwigExtensionBundle\Interfaces\StaticContainerServiceInterface;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class StaticContainerExtension extends AbstractExtension
{
    public function __construct(private StaticContainerServiceInterface $staticContainerService)
    {
    }

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

    public function create(string $key, $value = null): void
    {
        $this->staticContainerService->create($key, $value);
    }

    public function update(string $key, $value): void
    {
        $this->staticContainerService->update($key, $value);
    }

    public function has(string $key): bool
    {
        return $this->staticContainerService->has($key);
    }

    public function get(string $key): mixed
    {
        return $this->staticContainerService->get($key);
    }

    public function remove(string $key): void
    {
        $this->staticContainerService->remove($key);
    }
}
