<?php
class ShopProduct
{
	const AVAILABLE = 0;
	const OUT_OF_STOCK = 1;

    protected $id = 0;
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    )
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    /**
     * @param string $producerMainName
     */
    public function setProducerMainName($producerMainName)
    {
        $this->producerMainName = $producerMainName;
    }

    /**
     * @return string
     */
    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    /**
     * @param string $producerFirstName
     */
    public function setProducerFirstName($producerFirstName)
    {
        $this->producerFirstName = $producerFirstName;
    }

    public function getPrice()
    {
        return ($this->price - $this->discount);
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)){
            return null;
        }

        if ($row['type'] == "book"){
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
            (float) $row['price'],
                (int) $row['numpages']
            );
        }elseif ($row['type'] == "cd"){
            $product = new CdProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['playlength']
            );
        }else{
            $firstname = (is_null($row['firstname']))? "" : $row ['firstname'] ;
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price']
            );
        }

        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;
    }
}