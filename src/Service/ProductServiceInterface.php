<?php declare(strict_types=1);

namespace App\ProductsService\Service;

/**
 * Interface ProductServiceInterface
 *
 * @package App\ProductsService\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
interface ProductServiceInterface
{
    /**
     * Get a product by ID
     *
     * @param integer $productId
     * @return array
     */
    public function getProduct(int $productId): array;

    /**
     * Find products
     *
     * @param array $productParams
     * @return array
     */
    public function findProducts(array $productParams): array;

    /**
     * Insert Product
     *
     * @param array $productData
     * @return boolean
     */
    public function insertProduct(array $productData): bool;
}
