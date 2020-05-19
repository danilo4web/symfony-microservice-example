<?php declare(strict_types=1);

namespace App\ProductsService\Actions;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GreetAction
 * @package App\ProductsService\Actions
 */
class GreetAction
{
    /** @var string */
    private $greeting;

    /** @var LoggerInterface */
    private $logger;

    /**
     * GreetAction constructor.
     * @param string                   $greeting
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(string $greeting, LoggerInterface $logger)
    {
        $this->greeting = $greeting;
        $this->logger = $logger;
    }

    public function __invoke(Request $request): Response
    {
        $this->logger->debug('Welcome to Product Service');
        return new JsonResponse(['greeting' => $this->greeting]);
    }
}
