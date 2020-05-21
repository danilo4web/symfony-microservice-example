<?php declare(strict_types=1);

namespace App\ProductsService\Entity;

/**
 * class: ProductCollection
 *
 * @package App\ProductsService\Entity
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class ProductCollection implements \IteratorAggregate, \Countable
{
    /** @var array */
    protected $collection = [];

    /**
     * @return integer
     */
    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @param $productEntity
     * @return $this
     */
    public function add($productEntity): ProductCollection
    {
        $this->collection["{$productEntity->getId()}"] = $productEntity;
        return $this;
    }

    /**
     * @param ProductEntity $productEntity
     * @return void
     */
    public function remove($productEntity): void
    {
        unset($this->collection["{$productEntity->getId()}"]);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->collection);
    }
}
