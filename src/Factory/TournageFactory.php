<?php

namespace App\Factory;

use App\Entity\Tournage;
use App\Repository\TournageRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Tournage>
 *
 * @method        Tournage|Proxy create(array|callable $attributes = [])
 * @method static Tournage|Proxy createOne(array $attributes = [])
 * @method static Tournage|Proxy find(object|array|mixed $criteria)
 * @method static Tournage|Proxy findOrCreate(array $attributes)
 * @method static Tournage|Proxy first(string $sortedField = 'id')
 * @method static Tournage|Proxy last(string $sortedField = 'id')
 * @method static Tournage|Proxy random(array $attributes = [])
 * @method static Tournage|Proxy randomOrCreate(array $attributes = [])
 * @method static TournageRepository|RepositoryProxy repository()
 * @method static Tournage[]|Proxy[] all()
 * @method static Tournage[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Tournage[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Tournage[]|Proxy[] findBy(array $attributes)
 * @method static Tournage[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Tournage[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class TournageFactory extends ModelFactory
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
            'dateDebut' => self::faker()->text(5),
            'dateFin' => self::faker()->text(5),
            'film' => FilmFactory::randomOrCreate(),
            'lieu' => LieuFactory::randomOrCreate(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Tournage $tournage): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Tournage::class;
    }
}
