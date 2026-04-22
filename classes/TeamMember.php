<?php
require_once 'Person.php';

class TeamMember extends Person {
    private $bio;
    private $image;

    public function __construct($name, $role, $bio, $image) {
        parent::__construct($name, $role);
        $this->bio= $bio;
        $this->image= $image;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getImage() {
        return $this->image;
    }
}