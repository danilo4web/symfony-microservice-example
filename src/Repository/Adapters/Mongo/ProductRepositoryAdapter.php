<?php declare(strict_types=1);

namespace App\ProductsService\Repository\Adapters\Mongo;

/**
 * Class ProductRepositoryAdapter
 *
 * @package   App\ProductsService\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
class ProductRepositoryAdapter extends MongoRepositoryAdapter implements ProductRepositoryAdapterInterface
{
    /**
     * @inheritDoc
     */
    public function getProduct(int $productId): array
    {
        $filter = ['_id' => $productId];
        $result = $this->find($filter);

        if (!$result) {
            return false;
        }

        return (array) current($result);
    }
}