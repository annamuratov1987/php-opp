<?php
class ShopProductWriter
{
    private $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write($shopProduct){
        $str = "";
        foreach ($this->products as $ShopProduct){
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})<br />\n";
        }
        print $str;
    }
}