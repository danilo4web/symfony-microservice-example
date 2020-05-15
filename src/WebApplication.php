<?php declare(strict_types=1);

namespace App\ProductsService;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\TerminableInterface;

class WebApplication
{
    /** @var EventDispatcherInterface */
    private $dispatcher;

    /** @var RouterListener */
    private $router;

    /** @var HttpKernelInterface */
    private $kernel;

    /**
     * WebApplication constructor.
     * @param \Symfony\Component\HttpKernel\HttpKernelInterface           $kernel
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     * @param \Symfony\Component\HttpKernel\EventListener\RouterListener  $router
     */
    public function __construct(
        HttpKernelInterface $kernel,
        EventDispatcherInterface $dispatcher,
        RouterListener $router
    ) {
        $this->dispatcher = $dispatcher;
        $this->router = $router;
        $this->kernel = $kernel;

        $this->dispatcher->addSubscriber($this->router);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return void
     * @throws \Exception
     */
    public function run(Request $request): void
    {
        try {
            $response = $this->kernel->handle($request);
            $response->send();

            if ($this->kernel instanceof TerminableInterface) {
                $this->kernel->terminate($request, $response);
            }
        } catch (NotFoundHttpException $exception) {
            (new JsonResponse(['error' => sprintf('Path %s does not exist.', $request->getPathInfo())],
                Response::HTTP_NOT_FOUND))->send();
        } catch (HttpException $exception) {
            (new JsonResponse(['error' => $exception->getMessage()],
                Response::HTTP_NOT_FOUND))->send();
        }
    }
}
