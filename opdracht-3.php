<?php

class Figuur {
    protected $vorm;
    protected $kleur;

    public function __construct($vorm, $kleur) {
        $this->setVorm($vorm);
        $this->setKleur($kleur);
    }

    public function getVorm() {
        return $this->vorm;
    }

    public function setVorm($vorm) {
        $this->vorm = $vorm;
    }

    public function getKleur() {
        return $this->kleur;
    }

    public function setKleur($kleur) {
        $this->kleur = $kleur;
    }

    public function draw() {
        if ($this->getVorm() === 'vierkant') {
            return "<div style='display: inline-block; margin-right: 10px;'><svg width='50' height='50' xmlns='http://www.w3.org/2000/svg'><rect width='50' height='50' fill='{$this->getKleur()}' /></svg></div>";
        } elseif ($this->getVorm() === 'cirkel') {
            return "<div style='display: inline-block; margin-right: 10px;'><svg width='50' height='50' xmlns='http://www.w3.org/2000/svg'><circle cx='25' cy='25' r='25' fill='{$this->getKleur()}' /></svg></div>";
        } elseif ($this->getVorm() === 'rechthoek') {
            return "<div style='display: inline-block; margin-right: 10px;'><svg width='100' height='50' xmlns='http://www.w3.org/2000/svg'><rect width='100' height='50' fill='{$this->getKleur()}' /></svg></div>";
        } elseif ($this->getVorm() === 'driehoek') {
            return "<div style='display: inline-block; margin-right: 10px;'><svg width='50' height='50' xmlns='http://www.w3.org/2000/svg'><polygon points='25,0 50,50 0,50' fill='{$this->getKleur()}' /></svg></div>";
        }

        return "";
    }
}

$vierkantKleur = "#00FFFF";
$cirkelKleur = "#827DEB";
$rechthoekKleur = "red";
$driehoekKleur = "yellow";

for ($i = 0; $i < 3; $i++) {
    $vierkant = new Figuur("vierkant", $vierkantKleur);
    echo $vierkant->draw();
}

echo "<br>";

for ($i = 0; $i < 3; $i++) {
    $cirkel = new Figuur("cirkel", $cirkelKleur);
    echo $cirkel->draw();
}

echo "<br>"; 

for ($i = 0; $i < 3; $i++) {
    $rechthoek = new Figuur("rechthoek", $rechthoekKleur);
    echo $rechthoek->draw();
}

echo "<br>";

for ($i = 0; $i < 3; $i++) {
    $driehoek = new Figuur("driehoek", $driehoekKleur);
    echo $driehoek->draw();
}

?>
