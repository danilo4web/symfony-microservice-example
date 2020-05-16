<?php declare(strict_types=1);

namespace App\ProductsService\Repository\Adapters\Mongo;

use MongoDB\Driver\Manager;
use MongoDB\Driver\Cursor;
use MongoDB\Driver\Query;
use MongoDB\Driver\WriteResult;
use MongoDB\Driver\BulkWrite;

/**
 * Abstract Class MongoRepositoryAdapter
 * @package App\ProductsService\Repository\Adapters\Mongo
 */
abstract class MongoRepositoryAdapter
{
    /** @var \MongoDB\Driver\Manager */
    protected Manager $manager;

    /**
     * DefaultRepository constructor.
     * @param \MongoDB\Driver\Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param array $filter
     * @param array $options
     *
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function find(array $filter, array $options = []): Cursor
    {
        /** @var \MongoDB\Driver\Query */
        $query = $this->getQuery($filter, $options);

        /** @var \MongoDB\Driver\Cursor */
        return $this->manager->executeQuery("products.products", $query);
    }

    /**
     * @param array $filter
     * @param array $options
     * @return \MongoDB\Driver\Query
     */
    private function getQuery(array $filter, array $options = []): Query
    {
        return new Query($filter, $options);
    }

    /**
     * @param array $data
     * @return \MongoDB\Driver\WriteResult
     */
    public function save(array $data): WriteResult
    {
        /** @var \MongoDB\Driver\BulkWrite */
        $bulk = $this->getBulkWrite();

        $bulk->insert($data);

        /** @var \MongoDB\Driver\WriteResult */
        return $this->manager->executeBulkWrite("products.products", $bulk);
    }

    /**
     * @return \MongoDB\Driver\BulkWrite
     */
    private function getBulkWrite(): BulkWrite
    {
        /** @var \MongoDB\Driver\BulkWrite */
        return new BulkWrite();
    }
}
