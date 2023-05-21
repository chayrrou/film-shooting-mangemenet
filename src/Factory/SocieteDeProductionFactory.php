<?php

namespace App\Factory;

use App\Entity\SocieteDeProduction;
use App\Repository\SocieteDeProductionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<SocieteDeProduction>
 *
 * @method        SocieteDeProduction|Proxy create(array|callable $attributes = [])
 * @method static SocieteDeProduction|Proxy createOne(array $attributes = [])
 * @method static SocieteDeProduction|Proxy find(object|array|mixed $criteria)
 * @method static SocieteDeProduction|Proxy findOrCreate(array $attributes)
 * @method static SocieteDeProduction|Proxy first(string $sortedField = 'id')
 * @method static SocieteDeProduction|Proxy last(string $sortedField = 'id')
 * @method static SocieteDeProduction|Proxy random(array $attributes = [])
 * @method static SocieteDeProduction|Proxy randomOrCreate(array $attributes = [])
 * @method static SocieteDeProductionRepository|RepositoryProxy repository()
 * @method static SocieteDeProduction[]|Proxy[] all()
 * @method static SocieteDeProduction[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static SocieteDeProduction[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static SocieteDeProduction[]|Proxy[] findBy(array $attributes)
 * @method static SocieteDeProduction[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SocieteDeProduction[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class SocieteDeProductionFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'adresse' => self::faker()->text(10),
            'nom' => self::faker()->lastname(2),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(SocieteDeProduction $societeDeProduction): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SocieteDeProduction::class;
    }
}
