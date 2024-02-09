<!-- Athor: Lucas Tanis -->

<?php
 
class Room {
    private $length;
    private $width;
    private $height;
 
    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }
 
    public function calculateVolume() {
        return $this->length * $this->width * $this->height;
    }
 
    // Getter-methoden voor lengte, breedte en hoogte
    public function getLength() {
        return $this->length;
    }
 
    public function getWidth() {
        return $this->width;
    }
 
    public function getHeight() {
        return $this->height;
    }
 
    // Setter-methoden om waarden in te stellen
    public function setLength($length) {
        $this->length = $length;
    }
 
    public function setWidth($width) {
        $this->width = $width;
    }
 
    public function setHeight($height) {
        $this->height = $height;
    }
}
 
class House {
    private $rooms = [];
 
    public function addRoom(Room $room) {
        $this->rooms[] = $room;
    }
 
    public function getRooms() {
        return $this->rooms;
    }
 
    public function calculateTotalVolume() {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->calculateVolume();
        }
        return $totalVolume;
    }
 
    public function calculatePrice() {
        $totalVolume = $this->calculateTotalVolume();
        $pricePerCubicMeter =   1500; // Aangepaste prijsfactor per kubieke meter
        return $totalVolume * $pricePerCubicMeter;
    }
}
 
// Maak een huis aan
$house = new House();
 
// Voeg kamers toe aan het huis
$room1 = new Room(5.2, 5.1, 5.5);
$room2 = new Room(4.8, 4.6, 4.9);
$room3 = new Room(5.9, 2.5, 3.1);
 
$house->addRoom($room1);
$house->addRoom($room2);
$house->addRoom($room3);
 
// Bereken en toon de resultaten
echo "Inhoud Kamers:<br>";
echo "<br>";
foreach ($house->getRooms() as $index => $room) {
    echo "Lengte: " . $room->getLength() . "m Breedte: " . $room->getWidth() . "m Hoogte: " . $room->getHeight() . "m ";
    if ($index < count($house->getRooms()) - 1) {
        echo "<br>";
    } else {
        echo "<br>";
    }
}
 
echo "<br>Volume Totaal = " . $house->calculateTotalVolume() . "m³<br>";
echo "Prijs van het huis is= €" . number_format($house->calculatePrice(), 2);
?>