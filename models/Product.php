<?php

class Product
{
    private int $id;
    private string $product_name, $product_image, $product_category;
    private float $product_price;

    /**
     * @param int $id
     * @param string $product_name
     * @param string $product_image
     * @param string $product_category
     * @param float $product_price
     */
    public function __construct(int $id, string $product_name, string $product_image, string $product_category, float $product_price)
    {
        $this->id = $id;
        $this->product_name = $product_name;
        $this->product_image = $product_image;
        $this->product_category = $product_category;
        $this->product_price = $product_price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return string
     */
    public function getProductImage(): string
    {
        return $this->product_image;
    }

    /**
     * @param string $product_image
     */
    public function setProductImage(string $product_image): void
    {
        $this->product_image = $product_image;
    }

    /**
     * @return string
     */
    public function getProductCategory(): string
    {
        return $this->product_category;
    }

    /**
     * @param string $product_category
     */
    public function setProductCategory(string $product_category): void
    {
        $this->product_category = $product_category;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->product_price;
    }

    /**
     * @param float $product_price
     */
    public function setProductPrice(float $product_price): void
    {
        $this->product_price = $product_price;
    }


}