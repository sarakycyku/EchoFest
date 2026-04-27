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

    public function __construct($id, $title, $date, $time, $location, $stage, $description, $artist, $image, $category) {
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

}