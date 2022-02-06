<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Service;

use Danilovl\StaticContainerTwigExtensionBundle\Interfaces\StaticContainerServiceInterface;

class StaticContainerService implements StaticContainerServiceInterface
{
    private array $container = [];

    public function create(string $key, mixed $value = null): void
    {
        if ($this->has($key)) {
            return;
        }

        $this->container[$key] = $value;
    }

    public function update(string $key, mixed $value): void
    {
        $this->container[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($this->container[$key]);
    }

    public function get(string $key): mixed
    {
        return $this->container[$key];
    }

    public function remove(string $key): void
    {
        unset($this->container[$key]);
    }
}
