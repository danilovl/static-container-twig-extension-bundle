<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Interfaces;

interface StaticContainerServiceInterface
{
    public function create(string $key, mixed $value = null): void;
    public function update(string $key, mixed $value): void;
    public function has(string $key): bool;
    public function get(string $key): mixed;
    public function remove(string $key): void;
}
