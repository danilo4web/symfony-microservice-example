<?php declare(strict_types=1);

namespace App\ProductsService\Repository;

/**
 * Class ProductRepository
 *
 * @package   App\ProductsService\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
class ProductRepository extends DefaultRepository implements ProductRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getProduct(int $productId): array
    {
        return $this->repositoryAdapter->getProduct($productId);
    }

    /**
     * @inheritDoc
     */
    public function findProducts(array $params, $options = []): array
    {
        return $this->repositoryAdapter->findProducts($params, $options);
    }

    /**
     * @inheritDoc
     */
    public function insertProduct(array $productsData): bool
    {
        return $this->repositoryAdapter->insertProduct($productsData);
    }
}
