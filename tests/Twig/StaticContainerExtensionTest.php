<?php declare(strict_types=1);

namespace Danilovl\StaticContainerTwigExtensionBundle\Tests\Twig;

use Danilovl\StaticContainerTwigExtensionBundle\Service\StaticContainerService;
use Danilovl\StaticContainerTwigExtensionBundle\Twig\StaticContainerExtension;
use Generator;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class StaticContainerExtensionTest extends TestCase
{
    private Environment $twig;

    public function setUp(): void
    {
        $this->twig = new Environment(new FilesystemLoader, [
            'cache' => __DIR__ . '/../../var/cache/twig-test',
        ]);

        $renderServiceExtension = new StaticContainerExtension(new StaticContainerService);
        $this->twig->addExtension($renderServiceExtension);
    }

    /**
     * @dataProvider filtersProvider
     */
    public function testFilters(
        string $firstTemplate,
        string $secondTemplate,
        mixed $expectedValue
    ): void {
        $this->twig->createTemplate($firstTemplate)->render();
        $output = $this->twig->createTemplate($secondTemplate)->render();

        $this->assertEquals($expectedValue, $output);
    }

    public function filtersProvider(): Generator
    {
        yield ["{{ static_container_create('staticKey', 'static value text') }}", "{{ static_container_get('staticKey') }}", 'static value text'];
        yield ["{{ static_container_update('staticKey', 'new static value text') }}", "{{ static_container_get('staticKey') }}", 'new static value text'];
        yield ["{{ static_container_remove('staticKey') }}", "{{ static_container_has('staticKey') }}", ''];
        yield ["{{ static_container_create('staticKey', 're-created static value text') }}", "{{ static_container_get('staticKey') }}", 're-created static value text'];
    }
}
