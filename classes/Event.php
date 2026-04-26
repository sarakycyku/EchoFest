<?php

class Event {
    private $id;
    private $title;
    private $date;
    private $time;
    private $location;
    private $stage;
    private $description;
    private $artist;
    private $image;
    private $category; 

    public function __construct($id = null, $title = "", $date = "", $time = "", $location = "", $stage = "", $description = "", $artist = "", $image = "", $category = "") {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->time = $time;
        $this->location = $location;
        $this->stage = $stage;
        $this->description = $description;
        $this->artist = $artist;
        $this->image = $image;
        $this->category = $category;
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getLocation() { return $this->location; }
    public function getStage() { return $this->stage; }
    public function getDescription() { return $this->description; }
    public function getArtist() { return $this->artist; }
    public function getImage() { return $this->image; }
    public function getCategory() { return $this->category; }

    public function setId($id) {
        if ($id !== null) {
            $this->id = $id;
        }
    }

    public function setTitle($title) {
        if (!empty($title)) {
            $this->title = $title;
        }
    }

    public function setDate($date) {
        if (!empty($date)) {
            $this->date = $date;
        }
    }

    public function setTime($time) {
        if (!empty($time)) {
            $this->time = $time;
        }
    }

    public function setLocation($location) {
        if (!empty($location)) {
            $this->location = $location;
        }
    }

    public function setStage($stage) {
        if (!empty($stage)) {
            $this->stage = $stage;
        }
    }

    public function setDescription($description) {
        if (!empty($description)) {
            $this->description = $description;
        }
    }

    public function setArtist($artist) {
        if (!empty($artist)) {
            $this->artist = $artist;
        }
    }

    public function setImage($image) {
        if (!empty($image)) {
            $this->image = $image;
        }
    }

    public function setCategory($category) {
        if (!empty($category)) {
            $this->category = $category;
        }
    }
}