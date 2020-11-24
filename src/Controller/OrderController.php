<?php

namespace App\Controller;

use App\Service\OrderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/orders/{orderId}", requirements={"orderId": "[a-zA-Z0-9-_]{2,25}"}, methods={"GET"}, name="api.order.getOrderById")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $orderId
     * @param OrderService                              $orderService
     *
     * @throws NotFoundHttpException
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getOrderByOrderId(Request $request, string $orderId, OrderService $orderService): JsonResponse
    {
    }
}
