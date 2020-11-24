<?php

namespace App;

class OrderDTO
{
    /**
     * @var string|null
     */
    private $orderCode;

    /**
     * @var int|null
     */
    private $productId;

    /**
     * @var int|null
     */
    private $quantity;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $shippingDate;

    /**
     * @return string|null
     */
    public function getOrderCode(): ?string
    {
        return $this->orderCode;
    }

    /**
     * @param string|null $orderCode
     */
    public function setOrderCode(?string $orderCode): void
    {
        $this->orderCode = $orderCode;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     */
    public function setProductId(?int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getShippingDate(): ?string
    {
        return $this->shippingDate;
    }

    /**
     * @param string|null $shippingDate
     */
    public function setShippingDate(?string $shippingDate): void
    {
        $this->shippingDate = $shippingDate;
    }
}