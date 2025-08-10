<?php
class Car {
    public $brand = "BMW"; // Public
    protected $color = "Black"; // Protected
    private $engineNumber = "123ABC"; // Private

    public function __construct($brand, $color, $engineNumber) {
        $this->brand = $brand;
        $this->color = $color;
        $this->engineNumber = $engineNumber;
    }

    public function getEngineNumber() {
        return $this->engineNumber ;
    }
    public function getColor() {
    return $this->color;
}
}

$car1 = new Car("Toyota","Red", "456DEF");
echo $car1->brand . "\n"; // কাজ করবে
echo $car1->getColor(); // Error

echo $car1->getEngineNumber(); // Private access method
?>