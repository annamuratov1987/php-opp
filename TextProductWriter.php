<?php
class TextProductWriter extends ShopProductWriter
{

    public function write()
    {
        $str = "ТОВАРЫ:\n";
        foreach ($this->products as $shopProduct)  {
            $str .= $shopProduct->getSummaryLine()."\n";
        }
        print $str;
    }
}