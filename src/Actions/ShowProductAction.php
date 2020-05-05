<?php declare(strict_types=1);

namespace App\ProductsService\Actions;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\ProductsService\Service\ProductServiceInterface;
use App\ProductsService\Entity\ProductEntity;


final class ShowProductAction implements ShowProductActionInterface
{
    /** @var ProductServiceInterface $productService */
    private $productService;

    /**
     * ShowProductAction constructor.
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
        $productId = (int)$request->attributes->get('id');

        try {

            /** @var ProductEntity $productEntity */
            $productEntity = $this->productService->getProduct($productId);

            if ($productEntity instanceof ProductEntity) {
                return new JsonResponse([$productEntity->toArray()], Response::HTTP_OK);
            }

        } catch (\RuntimeException $exception) {
            return new JsonResponse([
                'error' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage(),
                'details' => [
                    'id' => $productId,
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([
            'error' => Response::HTTP_NOT_FOUND,
            'message' => 'Product could not be found.',
            'details' => [
                'id' => $productId
            ]
        ], Response::HTTP_NOT_FOUND);
    }
}
