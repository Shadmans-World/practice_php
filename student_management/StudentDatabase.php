<?php
class StudentDatabase {
    private $students = [];

    public function addStudent(Student $student) {
        $this->students[] = $student;
    }

    public function getAllStudents() {
        return $this->students;
    }

    public function findStudentByRoll($roll) {
        foreach ($this->students as $student) {
            if ($student->getRoll() == $roll) {
                return $student;
            }
        }
        return null;
    }
}
