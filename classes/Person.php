<?php

class Person {
    protected $name;
    protected $role;

    public function __construct($name= "", $role= "") {
        $this-> name= $name;
        $this-> role= $role;
    }

    public function getName() {
        return $this-> name;
    }

    public function getRole() {
        return $this->role;
    }

    public function setName($name) {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function setRole($role) {
        if (!empty($role)) {
            $this->role = $role;
        }
    }
}