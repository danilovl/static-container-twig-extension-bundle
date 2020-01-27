<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Services;

class StaticContainerService
{
    /**
     * @var array
     */
    private $container = [];

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
