<?php

require_once('human.php');

// Клас Student успадковується від Human
class Student extends Human {
    private $university;
    private $course;

    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function moveToNextCourse() {
        $this->course++;
    }
}

?>
