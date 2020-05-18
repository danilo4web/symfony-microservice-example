<?php declare(strict_types=1);

namespace App\ProductsService\Actions;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\ProductsService\Service\ProductServiceInterface;

/**
 * Class ListProductAction
 * @package App\ProductsService\Actions
 */
final class ListProductAction implements ListProductActionInterface
{
    /** @var ProductServiceInterface $productService */
    private $productService;

    /**
     * FindProductAction constructor.
     * @param \App\ProductsService\Service\ProductServiceInterface $productService
     */
    public function __construct(
        ProductServiceInterface $productService
    ) {
        $this->productService = $productService;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request): Response
    {
        try {

            /** @var array $response */
            $response = $this->productService->findProducts([]);

            if ($response) {
                return new JsonResponse($response, Response::HTTP_OK);
            }

        } catch (\RuntimeException $exception) {
            return new JsonResponse([
                'error' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([
            'error' => Response::HTTP_NOT_FOUND,
            'message' => 'Any product could not be found.',
        ], Response::HTTP_NOT_FOUND);
    }
}
