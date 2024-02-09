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

?>