<?php declare(strict_types=1);

namespace App\ProductsService\Service;

use App\ProductsService\Repository\ProductRepositoryInterface;
use App\ProductsService\Entity\ProductEntity;

/**
 * Class ProductService
 *
 * @package App\ProductsService\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class ProductService implements ProductServiceInterface
{
    /** @var ProductRepositoryInterface */
    private $productRepository;

    /**
     * Product Service constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @inheritDoc
     */
    public function getProduct(int $productId): array
    {
        return $this->productRepository->getProduct($productId);
    }

    /**
     * @inheritDoc
     */
    public function getProducts(int $skip, int $take): array
    {
        return $this->productRepository->findProducts($skip, $take);
    }
}
