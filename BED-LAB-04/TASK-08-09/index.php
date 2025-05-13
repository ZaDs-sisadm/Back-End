<?php

require_once('student.php');
require_once('programmer.php');

// Перевірка роботи

$student = new Student();
$student->setHeight(170);
$student->setWeight(60);
$student->setAge(20);
$student->setUniversity("Example University");
$student->setCourse(1);

echo "Student's height: " . $student->getHeight() . "<br>";
echo "Student's weight: " . $student->getWeight() . "<br>";
echo "Student's age: " . $student->getAge() . "<br>";
echo "Student's university: " . $student->getUniversity() . "<br>";
echo "Student's course: " . $student->getCourse() . "<br>";

$student->moveToNextCourse();
echo "Student moved to next course. New course: " . $student->getCourse() . "<br>";

$programmer = new Programmer();
$programmer->setHeight(180);
$programmer->setWeight(70);
$programmer->setAge(25);
$programmer->setExperience("5 years");
$programmer->setProgrammingLanguages(["PHP", "JavaScript"]);

echo "Programmer's height: " . $programmer->getHeight() . "<br>";
echo "Programmer's weight: " . $programmer->getWeight() . "<br>";
echo "Programmer's age: " . $programmer->getAge() . "<br>";
echo "Programmer's experience: " . $programmer->getExperience() . "<br>";
echo "Programmer's programming languages: " . implode(", ", $programmer->getProgrammingLanguages()) . "<br>";

$programmer->learnNewLanguage("Python");
echo "Programmer learned a new language. Now knows: " . implode(", ", $programmer->getProgrammingLanguages()) . "<br>";

?>
