# DDD Doctrine Bundle

Symfony Bundle for the DDD Doctrine Bridge. Provides service wiring and configuration for Doctrine integration.

## Installation

```bash
composer require alexandrebulete/ddd-doctrine-bundle
```

## Configuration

Add the bundle to your `config/bundles.php`:

```php
return [
    // ...
    AlexandreBulete\DddDoctrineBundle\DddDoctrineBundle::class => ['all' => true],
];
```

## Features

This bundle automatically registers services from `ddd-doctrine-bridge`:
- `DoctrineRepository` base class available for autowiring
- `DoctrinePaginator` available for autowiring

## Doctrine Types Registration

Register your custom Doctrine types in `config/packages/doctrine.yaml`:

```yaml
doctrine:
    dbal:
        types:
            post_id: App\Post\Infrastructure\Doctrine\Type\PostIdType
            post_title: App\Post\Infrastructure\Doctrine\Type\PostTitleType
```

