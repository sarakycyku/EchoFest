<?php

class Person {
    protected $name;
    protected $role;

    public function _construct($name, $role) {
        $this-> name= $name;
        $this-> role= $role;
    }

    public function getName() {
        return $this-> name;
    }

    public function getRole() {
        return $this->role;
    }
}