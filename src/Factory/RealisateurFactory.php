<?php

namespace App\Factory;

use App\Entity\Realisateur;
use App\Repository\RealisateurRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Realisateur>
 *
 * @method        Realisateur|Proxy create(array|callable $attributes = [])
 * @method static Realisateur|Proxy createOne(array $attributes = [])
 * @method static Realisateur|Proxy find(object|array|mixed $criteria)
 * @method static Realisateur|Proxy findOrCreate(array $attributes)
 * @method static Realisateur|Proxy first(string $sortedField = 'id')
 * @method static Realisateur|Proxy last(string $sortedField = 'id')
 * @method static Realisateur|Proxy random(array $attributes = [])
 * @method static Realisateur|Proxy randomOrCreate(array $attributes = [])
 * @method static RealisateurRepository|RepositoryProxy repository()
 * @method static Realisateur[]|Proxy[] all()
 * @method static Realisateur[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Realisateur[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Realisateur[]|Proxy[] findBy(array $attributes)
 * @method static Realisateur[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Realisateur[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class RealisateurFactory extends ModelFactory
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
            'nationalite' => self::faker()->text(5),
            'nom' => self::faker()->lastname(2),
            'photo' => self::faker()->text(255),
            'prenom' => self::faker()->firstname(2),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Realisateur $realisateur): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Realisateur::class;
    }
}
