<?php declare(strict_types=1);

namespace App\ProductsService\Actions;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\ProductsService\Service\ProductServiceInterface;

/**
 * Class InsertProductAction
 * @package App\ProductsService\Actions
 */
final class InsertProductAction implements InsertProductActionInterface
{
    /** @var ProductServiceInterface $productService */
    private $productService;

    /**
     * InsertProductAction constructor.
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
        /** @var array $data */
        $data = json_decode($request->getContent(), true);

        try {

            /** @var array $response */
            $response = $this->productService->insertProduct($data);

            if ($response) {
                return new JsonResponse('The product was included', Response::HTTP_CREATED);
            }

        } catch (\RuntimeException $exception) {
            return new JsonResponse([
                'error' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage(),
                'details' => $data
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([
            'error' => Response::HTTP_NOT_FOUND,
            'message' => 'Product could not be found.',
            'details' => $data
        ], Response::HTTP_NOT_FOUND);
    }
}
