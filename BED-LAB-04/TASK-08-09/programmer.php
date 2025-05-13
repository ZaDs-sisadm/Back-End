<?php

require_once('human.php');

// Клас Programmer успадковується від Human
class Programmer extends Human {
    private $programmingLanguages = [];
    private $experience;

    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function learnNewLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}

?>
