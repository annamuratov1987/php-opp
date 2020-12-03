<?php
include_once "ShopProduct.php";
include_once "BookProduct.php";
include_once "CdProduct.php";

$productl = new BookProduct("Собачье сердце","Михаил", "Булгаков", 5.99, 700);
$product2 = new CdProduct("Классическая музыка. Лучшее","Антонио", "Вивальди", 10.99, 80);

echo $productl->getSummaryLine()."<br>";
echo $product2->getSummaryLine();
