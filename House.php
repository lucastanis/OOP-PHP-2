<?php

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

?>