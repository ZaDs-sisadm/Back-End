<?php
class Circle {
    private $x;
    private $y;
    private $radius;
    public function __construct($x, $y, $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }
    public function getX() {
        return $this->x;
    }
    public function setX($x) {
        $this->x = $x;
    }
    public function getY() {
        return $this->y;
    }
    public function setY($y) {
        $this->y = $y;
    }
    public function getRadius() {
        return $this->radius;
    }
    public function setRadius($radius) {
        $this->radius = $radius;
    }
    public function __toString() {
        return "Коло з центром в ($this->x, $this->y) і радіусом $this->radius<br>";
    }
    public function intersects($otherCircle) {
        $distance = sqrt(($this->x - $otherCircle->getX())**2 + ($this->y - $otherCircle->getY())**2);
        return $distance < ($this->radius + $otherCircle->getRadius());
    }
}

// 2 круга
$circle1 = new Circle(0, 0, 5);
echo $circle1;
echo "X координата: " . $circle1->getX() . "<br>";
echo "Y координата: " . $circle1->getY() . "<br>";
echo "Радіус: " . $circle1->getRadius() . "<br><br>";

$circle2 = new Circle(3, 3, 4);
echo $circle2;
echo "X координата: " . $circle2->getX() . "<br>";
echo "Y координата: " . $circle2->getY() . "<br>";
echo "Радіус: " . $circle2->getRadius() . "<br><br>";

// Перевірка на перетин
if ($circle1->intersects($circle2)) {
    echo "Кола перетинаються<br>";
} else {
    echo "Кола не перетинаються<br>";
}

?>
