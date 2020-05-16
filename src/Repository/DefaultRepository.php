<?php declare(strict_types=1);

namespace App\ProductsService\Repository;

/**
 * Class DefaultRepository
 * @package App\ProductsService\Repository
 */
abstract class DefaultRepository implements DefaultRepositoryInterface
{
    /** @var \App\ProductsService\Repository\DefaultRepositoryInterface */
    protected $repositoryAdapter;

    /**
     * @param $repositoryAdapter
     */
    public function __construct($repositoryAdapter)
    {
        $this->repositoryAdapter = $repositoryAdapter;
    }
}
