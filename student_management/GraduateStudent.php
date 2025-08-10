<?php
require_once "Student.php";

class GraduateStudent extends Student {
    public $thesisTitle;

    public function __construct($name, $age, $roll, $department, $thesisTitle) {
        parent::__construct($name, $age, $roll, $department);
        $this->thesisTitle = $thesisTitle;
    }

    public function getInfo() {
        return parent::getInfo() . ", Thesis: {$this->thesisTitle}";
    }
}
