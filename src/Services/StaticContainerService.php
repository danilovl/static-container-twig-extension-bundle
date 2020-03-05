<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Services;

class StaticContainerService
{
	private array $container = [];

    public function create(string $key, $value = null): void
    {
        if ($this->has($key)) {
            return;
        }

        $this->container[$key] = $value;
    }

    public function update(string $key, $value): void
    {
        $this->container[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($this->container[$key]);
    }

    public function get(string $key)
    {
        return $this->container[$key];
    }

    public function remove(string $key): void
    {
        unset($this->container[$key]);
    }
}
