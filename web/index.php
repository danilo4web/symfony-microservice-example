<?php declare(strict_types=1);

use App\ProductsService\WebApplication;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require_once __DIR__ . '/../bootstrap.php';
$container
    ->get(WebApplication::class)
    ->run(Request::createFromGlobals());
