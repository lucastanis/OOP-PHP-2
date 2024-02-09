<!-- Athor: Lucas Tanis -->

<?php
 
require_once('House.php');
require_once('Room.php');
 

 
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