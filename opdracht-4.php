<?php

abstract class Product {
    protected $name;
    protected $purchasePrice;
    protected $tax;
    protected $profit;
    protected $description;
    protected $category;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }

    abstract public function getInfo();

    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getSalesPrice() {
        return $this->purchasePrice + $this->calculateProfit() + $this->calculateTax();
    }

    protected function calculateProfit() {
        return $this->purchasePrice * $this->profit;
    }

    protected function calculateTax() {
        return $this->purchasePrice * ($this->tax / 100);
    }
}

class Music extends Product {
    private $artist;
    private $numbers;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->category = "Muziek";
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }

    public function addNumber($number) {
        $this->numbers[] = $number;
    }

    public function getInfo() {
        return [
            'Artiest' => $this->artist,
            'numbers' => $this->numbers
        ];
    }
}

class Film extends Product {
    private $quality;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->category = "Film";
    }

    public function setQuality($quality) {
        $this->quality = $quality;
    }

    public function getInfo() {
        return [
            'Kwaliteit' => $this->quality
        ];
    }
}

class Game extends Product {
    private $genre;
    private $requirements;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->category = "Game";
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function addRequirements($requirement) {
        $this->requirements[] = $requirement;
    }

    public function getInfo() {
        return [
            'genre' => $this->genre,
            'requirements' => $this->requirements
        ];
    }
}

class ProductList {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProducts() {
        return $this->products;
    }
}

// Voorbeeld van het gebruik:
$productList = new ProductList();

$music = new Music("Amerikaanse Rap", 20, 10, 0.2, "Best of 2024");
$music->setArtist("Travis Scott");
$music->addNumber("Trance");
$music->addNumber("My Eyes");

$film = new Film("Movie Blu-ray", 30, 10, 0.3, "Awesome Action Movie");
$film->setQuality("HD");

$game = new Game("Game CD", 40, 10, 0.4, "Exciting Adventure Game");
$game->setGenre("Adventure");
$game->addRequirements("Minimum RAM: 8GB");
$game->addRequirements("Minimum CPU: Quad-core");

$productList->addProduct($music);
$productList->addProduct($film);
$productList->addProduct($game);

echo '<table border="1">
    <tr>
        <th>Naam</th>
        <th>Categorie</th>
        <th>Verkoopprijs</th>
        <th>Info</th>
    </tr>';

foreach ($productList->getProducts() as $product) {
    echo '<tr>';
    echo '<td>' . $product->getName() . '</td>';
    echo '<td>' . $product->getCategory() . '</td>';
    echo '<td>$' . $product->getSalesPrice() . '</td>';
    
    $info = '';
    if ($product instanceof Music) {
        $info = 'Artiest: ' . $product->getInfo()['Artiest'] . ', Songs: ' . implode(', ', $product->getInfo()['numbers']);
    } elseif ($product instanceof Film) {
        $info = 'Kwaliteit: ' . $product->getInfo()['Kwaliteit'];
    } elseif ($product instanceof Game) {
        $info = 'Genre: ' . $product->getInfo()['genre'] . ', Requirements: ' . implode(', ', $product->getInfo()['requirements']);
    }

    echo '<td>' . $info . '</td>';
    
    echo '</tr>';
}

echo '</table>';

?>
