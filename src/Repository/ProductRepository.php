<?php declare(strict_types=1);

namespace App\ProductsService\Repository;

use App\ProductsService\Entity\ProductEntity;

/**
 * Class ProductRepository
 *
 * @package   App\ProductsService\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
class ProductRepository implements ProductRepositoryInterface
{
    /** @var ProductEntity */
    private $productEntity;

    /**
     * Product Repository constructor.
     * @param ProductEntity $productEntity
     */
    public function __construct(
        ProductEntity $productEntity
    ) {
        $this->productEntity = $productEntity;
    }

    /**
     * @inheritDoc
     */
    public function getProduct(int $productId): array
    {
        return [];
    }
}
