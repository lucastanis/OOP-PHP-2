<?php

class House {
    private $floors;
    private $rooms;
    private $width;
    private $height;
    private $depth;

    public function __construct($floors, $rooms, $width, $height, $depth) {
        $this->setFloors($floors);
        $this->setRooms($rooms);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setDepth($depth);
    }

    public function setFloors($floors) {
        $this->floors = $floors;
    }

    public function setRooms($rooms) {
        $this->rooms = $rooms;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setDepth($depth) {
        $this->depth = $depth;
    }

    public function getFloors() {
        return $this->floors;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getDepth() {
        return $this->depth;
    }

    public function calculatePrice() {
        // Bereken de prijs op basis van specifieke kenmerken van het huis
        if ($this->floors == 2 && $this->rooms == 4) {
            return 150000;
        } elseif ($this->floors == 3 && $this->rooms == 6) {
            return 225000;
        } elseif ($this->floors == 2 && $this->rooms == 3) {
            return 112500;  
        }
    }
}
// 3 Huizen + Gegevens
$house1 = new House(2, 4, 10, 8, 12);
$house2 = new House(3, 5, 12, 9, 15);
$house3 = new House(1, 3, 3, 5, 5);

// Aanpassingen voor elk huis
$house1->setFloors(2);
$house1->setRooms(4);
$house1->setWidth(5);
$house1->setHeight(4);
$house1->setDepth(5);

$house2->setFloors(3);
$house2->setRooms(6);
$house2->setWidth(6);
$house2->setHeight(5);
$house2->setDepth(5);

$house3->setFloors(2);
$house3->setRooms(3); 
$house3->setWidth(3);
$house3->setHeight(5);
$house3->setDepth(5);

// Toon informatie over elk huis
echo "Huis 1 - Verdiepingen: " . $house1->getFloors() . ", Kamers: " . $house1->getRooms() . ", Volume: " . $house1->getWidth() * $house1->getHeight() * $house1->getDepth() . "m³, Prijs: $" . $house1->calculatePrice(); echo "<br>";
echo "Huis 2 - Verdiepingen: " . $house2->getFloors() . ", Kamers: " . $house2->getRooms() . ", Volume: " . $house2->getWidth() * $house2->getHeight() * $house2->getDepth() . "m³, Prijs: $" . $house2->calculatePrice(); echo "<br>";
echo "Huis 3 - Verdiepingen: " . $house3->getFloors() . ", Kamers: " . $house3->getRooms() . ", Volume: " . $house3->getWidth() * $house3->getHeight() * $house3->getDepth() . "m³, Prijs: $" . $house3->calculatePrice(); echo "<br>";

?>
