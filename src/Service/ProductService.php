<?php declare(strict_types=1);

namespace App\ProductsService\Service;

use App\ProductsService\Repository\ProductRepositoryInterface;

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
    public function findProducts(array $productParams): array
    {
        $options = [
            'projection' => ['_id' => 0],
            'sort' => ['name' => -1]
        ];

        return $this->productRepository->findProducts($productParams, $options);
    }
}
