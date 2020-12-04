<?php
abstract class ShopProductWriter
{
    private $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write();
}