<?php declare(strict_types=1);

namespace App\ProductsService\Entity;


use Illuminate\Support\Collection;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/**
 * Abstract Class: DefaultEntityAbstract
 *
 * @package App\ProductsService\Entity
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
abstract class DefaultEntityAbstract
{
    /**
     * @return array
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function toArray(): array
    {
        return (new Serializer([new GetSetMethodNormalizer()]))->normalize($this, 'array');
    }

    /**
     * @param $object
     * @return object
     */
    public function hydrate($object): object
    {
        foreach ($object as $property => $value) {
            if (is_string($value) || is_numeric($value)) {
                $this->{'set' . ucfirst($property)}($value);
            }
        }

        return $this;
    }

    /**
     * @return string
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
