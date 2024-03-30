[![phpunit](https://github.com/danilovl/static-container-twig-extension-bundle/actions/workflows/phpunit.yml/badge.svg)](https://github.com/danilovl/static-container-twig-extension-bundle/actions/workflows/phpunit.yml)
[![downloads](https://img.shields.io/packagist/dt/danilovl/static-container-twig-extension-bundle)](https://packagist.org/packages/danilovl/static-container-twig-extension-bundle)
[![latest Stable Version](https://img.shields.io/packagist/v/danilovl/static-container-twig-extension-bundle)](https://packagist.org/packages/danilovl/static-container-twig-extension-bundle)
[![license](https://img.shields.io/packagist/l/danilovl/static-container-twig-extension-bundle)](https://packagist.org/packages/danilovl/static-container-twig-extension-bundle)

# StaticContainerTwigExtensionBundle #

## About ##

Twig extension provide sharing data between templates.

### Requirements 

  * PHP 8.3 or higher
  * Symfony 7.0 or higher

### 1. Installation

Install `danilovl/static-container-twig-extension-bundle` package by Composer:
 
``` bash
composer require danilovl/static-container-twig-extension-bundle
```
 
Add the StaticContainerTwigExtensionBundle to your application's bundles if does not add automatically:

``` php
<?php
// config/bundles.php

return [
    // ...
    Danilovl\StaticContainerTwigExtensionBundle\StaticContainerTwigExtensionBundle::class => ['all' => true]
];
```

### 2. Usage

Create some key with value.

```twig
{# templates/first.html.twig #}

{{ static_container_create('key', true) }}
{{ static_container_create('keyObject', object) }}
{{ static_container_create('keyArray', {'one': 1, 'two': 2}) }}
{{ static_container_create('keyWithDefaultValueNull') }}
{{ static_container_create('keyCounter', 1) }}
```

Control if the key exists in another template.

```twig
{# templates/second.html.twig #}

{% if static_container_has('keyCounter') == true %}
    {{ static_container_update('keyCounter', 2) }}
{% endif %}
```
 
Control if the key exists and print it.
 
```twig
{# templates/third.html.twig #}

{% if static_container_has('keyCounter') == true %}
   {{ static_container_get('keyCounter') }}
{% endif %}
```
  
Remove key.
 
```twig
{# templates/third.html.twig #}
{{ static_container_remove('sameKey') }}
```

## License

The ApplyFilterTwigExtensionBundle is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
