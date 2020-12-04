<?php
include_once "ShopProduct.php";
include_once "BookProduct.php";
include_once "CdProduct.php";

$productl = new BookProduct("Собачье сердце","Михаил", "Булгаков", 5.99, 700);
$product2 = new CdProduct("Классическая музыка. Лучшее","Антонио", "Вивальди", 10.99, 80);

echo $productl->getSummaryLine()."<br>";
echo $product2->getSummaryLine();
?>
<br>--------------------------<br>

<?php
$dsn = "sqlite:/..\products.db";
$pdo = new \PDO($dsn, null, null);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//$result = $pdo->exec("CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT, type TEXT, firstname TEXT, mainname TEXT, title TEXT, price FLOAT, numpages INTEGER, playlength INTEGER, discount INTEGER);");
//$result = $pdo->exec("INSERT INTO products VALUES (null, 'book', 'Javlon', 'Annamuratov', 'Kitob', 155.5, 100, 80, 10);");
$obj = ShopProduct::getInstance(1, $pdo);
var_dump($obj);
$pdo = null;
?>
<br>--------------------------<br>


