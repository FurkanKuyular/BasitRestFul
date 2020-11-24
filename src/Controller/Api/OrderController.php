<?php

namespace App\Controller\Api;

use App\OrderDTO;
use App\Form\OrderType;
use App\Service\OrderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Controller\Api\BaseController as Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    /**
     * @Route("api/orders", methods={"GET"}, name="api.order.getAllOrders")
     *
     * @param OrderService $orderService
     *
     * @return JsonResponse
     */
    public function getAllOrders(OrderService $orderService): JsonResponse
    {
        $orders = $orderService->getAllOrders();

        $jsonResponse = new \App\Response\JsonResponse();

        if (!empty($orders)) {
            $jsonResponse->setData($orders);
            $jsonResponse->setMessage('success');
        }

        $jsonResponse->setMessage('not found');

        return $this->jsonResponse($jsonResponse);
    }

    /**
     * @Route("api/orders", methods={"POST"}, name="api.order.createOrder")
     *
     * @param Request      $request
     * @param OrderService $orderService
     *
     * @return JsonResponse
     */
    public function createOrder(Request $request, OrderService $orderService): JsonResponse
    {
        $order = new OrderDTO();

        $form = $this->createForm(OrderType::class, $order);

        $form->submit((array) json_decode($request->getContent(), true), false);

        $createOrderResult = $orderService->createOrder($order);

        $jsonResponse = new \App\Response\JsonResponse();

        if (!empty($createOrderResult)) {
            $jsonResponse->setData($createOrderResult);
            $jsonResponse->setMessage('success');
        }

        return $this->jsonResponse($jsonResponse);
    }

    /**
     * @Route("api/orders/{orderId}", requirements={"orderId": "[a-zA-Z0-9-_]{1,25}"}, methods={"PUT"}, name="api.order.updateOrder")
     *
     * @param Request      $request
     * @param OrderService $orderService
     * @param string       $orderId
     *
     * @return JsonResponse
     */
    public function updateOrder(Request $request, OrderService $orderService, string $orderId): JsonResponse
    {
        $order = new OrderDTO();

        $form = $this->createForm(OrderType::class, $order);

        $form->submit((array) json_decode($request->getContent(), true), false);

        $updateOrderResult = $orderService->updateOrder($order, $orderId);

        $jsonResponse = new \App\Response\JsonResponse();

        if (!empty($updateOrderResult)) {
            $jsonResponse->setData($updateOrderResult);
            $jsonResponse->setMessage('success');
        }

        return $this->jsonResponse($jsonResponse);
    }
}
