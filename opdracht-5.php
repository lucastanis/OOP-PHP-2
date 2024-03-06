<?php

// Stap 1: Abstracte class Person
abstract class Person {
    private $name;
    private $eyeColor;
    private $hairColor;
    private $height;
    private $weight;

    public function __construct($name, $eyeColor, $hairColor, $height, $weight) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
    }

    abstract public function getRole();

    public function getName() {
        return $this->name;
    }

    public function getEyeColor() {
        return $this->eyeColor;
    }

    public function getHairColor() {
        return $this->hairColor;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }
}

// Stap 2: Child class Patient
class Patient extends Person {
    public function getRole() {
        return "Patient";
    }
}

// Stap 3: Abstracte class Staff
abstract class Staff extends Person {
    protected $hourlyRate;

    public function __construct($name, $eyeColor, $hairColor, $height, $weight, $hourlyRate) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight);
        $this->hourlyRate = $hourlyRate;
    }

    abstract public function calculateSalary($hoursWorked);

    public function getHourlyRate() {
        return $this->hourlyRate;
    }
}

// Stap 4: Child class Doctor
class Doctor extends Staff {
    public function getRole() {
        return "Doctor";
    }

    public function calculateSalary($hoursWorked) {
        return $hoursWorked * $this->getHourlyRate();
    }
}

// Stap 5: Child class Nurse
class Nurse extends Staff {
    public function getRole() {
        return "Nurse";
    }

    public function calculateSalary($hoursWorked) {
        // Bonus vanuit de Appointment wordt later toegevoegd
        return $this->getHourlyRate() * $hoursWorked;
    }
}

// Stap 6: Class Appointment
class Appointment {
    private $doctor;
    private $patient;
    private $nurse;
    private $startTime;
    private $endTime;

    public function __construct($doctor, $patient, $startTime, $endTime, $nurse = null) {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->nurse = $nurse;
    }

    public function getDoctor() {
        return $this->doctor;
    }

    public function getPatient() {
        return $this->patient;
    }

    public function getNurse() {
        return $this->nurse;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function getDurationInHours() {
        $start = new DateTime($this->startTime);
        $end = new DateTime($this->endTime);
        $duration = $start->diff($end);
        return $duration->h + ($duration->i / 60);
    }

    public function calculateCost() {
        $hoursWorked = $this->getDurationInHours();
        $cost = $this->doctor->calculateSalary($hoursWorked);

        if ($this->nurse !== null) {
            $cost += $this->nurse->calculateSalary($hoursWorked);
        }

        return $cost;
    }
}

$patient = new Patient("Lucas Tanis", "Blauw", "Groen", 180, 75);
$doctor = new Doctor("Doktor, Van Dijk", "Bruin", "Groen", 185, 80, 50);
$nurse = new Nurse("Zuster Jari", "Bruin", "Blond", 170, 60, 30);

$appointment = new Appointment($doctor, $patient, "2024-02-14 10:00:00", "2024-02-14 12:00:00", $nurse);

echo "Patient: " . $patient->getName() . "<br>";
echo "Dokter: " . $doctor->getName() . "<br>";
echo "Zuster: " . $nurse->getName() . "<br>";
echo "Begin Tijd: " . $appointment->getStartTime() . "<br>";
echo "Eind Tijd: " . $appointment->getEndTime() . "<br>";
echo "Tijd: " . $appointment->getDurationInHours() . " uren<br>";
echo "Kosten: $" . $appointment->calculateCost() . "<br>";

?>
