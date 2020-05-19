<?php declare(strict_types=1);

namespace App\ProductsService\Repository\Adapters\Mongo;

/**
 * Interface ProductRepositoryAdapterInterface
 *
 * @package   App\ProductsService\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
interface ProductRepositoryAdapterInterface
{
    /**
     * Get Product by ID
     *
     * @param integer $productId
     * @return array
     */
    public function getProduct(int $productId): array;

    /**
     * Find Products
     *
     * @param array $params
     * @param array $options
     * @return array
     */
    public function findProducts(array $params, array $options): array;

    /**
     * Insert Product
     *
     * @param array $productsData
     * @return boolean
     */
    public function insertProduct(array $productsData): bool;
}
