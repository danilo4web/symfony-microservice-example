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
     * Find a products by ID
     *
     * @param integer $productId
     * @return array
     */
    public function getProduct(int $productId): array;
}
