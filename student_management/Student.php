<?php
class Student {
    public $name;
    public $age;
    public $department;
    private $roll;
    public static $studentCount = 0;

    public function __construct($name, $age, $roll, $department) {
        $this->name = $name;
        $this->age = $age;
        $this->roll = $roll;
        $this->department = $department;
        self::$studentCount++;
    }

    // Getter for Roll (Encapsulation)
    public function getRoll() {
        return $this->roll;
    }

    // Student info
    public function getInfo() {
        return "Name: {$this->name}, Age: {$this->age}, Roll: {$this->roll}, Department: {$this->department}";
    }

    // Static method
    public static function getTotalStudents() {
        return self::$studentCount;
    }
}
