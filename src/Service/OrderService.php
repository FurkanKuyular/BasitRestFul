<?php

namespace App\Service;

use App\OrderDTO;
use App\Entity\Orders;
use Psr\Log\LoggerInterface;
use App\Repository\OrdersRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OrderService extends AbstractService
{
    /**
     * @var \App\Repository\OrdersRepository
     */
    private $ordersRepository;

    public function __construct(ContainerInterface $container, LoggerInterface $logger, OrdersRepository $orderRepository)
    {
        $this->ordersRepository = $orderRepository;

        parent::__construct($container, $logger);
    }

    /**
     * @param OrderDTO $order
     *
     * @return string|null
     */
    public function createOrder(OrderDTO $order): ?string
    {
        try {
            $orderEntity = new Orders();

            $orderEntity->setOrderCode($order->getOrderCode());
            $orderEntity->setAddress($order->getAddress());
            $orderEntity->setProductId($order->getProductId());
            $orderEntity->setQuantity($order->getQuantity());
            $orderEntity->setShippingDate($order->getShippingDate());

            $this->entityManager->persist($orderEntity);
            $this->entityManager->flush();

            return $orderEntity->getId();
        } catch (\Throwable $exception) {
            $this->logger->error(sprintf('OrderService-createOrder %s', $exception), [
                'orderCode' => $order->getOrderCode(),
            ]);
        }

        return null;
    }

    /**
     * @param OrderDTO $order
     * @param string   $orderId
     *
     * @return string|null
     */
    public function updateOrder(OrderDTO $order, string $orderId): ?string
    {
        try {
            $orderEntity = $this->entityManager->getRepository(Orders::class)->find($orderId);

            if (!$orderEntity) {
                throw new \Exception('Product could not found');
            }

            $orderEntity->setOrderCode($order->getOrderCode());
            $orderEntity->setAddress($order->getAddress());
            $orderEntity->setProductId($order->getProductId());
            $orderEntity->setQuantity($order->getQuantity());
            $orderEntity->setShippingDate($order->getShippingDate());

            $this->entityManager->flush();

            return $orderEntity->getId();
        } catch (\Throwable $exception) {
            $this->logger->error(sprintf('OrderService-updateOrder %s', $exception), [
                'orderId' => $orderId,
            ]);
        }

        return null;
    }

    /**
     * @return array|null
     */
    public function getAllOrders(): ?array
    {
        try {
            return $this->ordersRepository->getAllOrders();
        } catch (\Throwable $exception) {
            $this->logger->error(sprintf('OrderService-getAllOrders %s', $exception));
        }

        return null;
    }
}
