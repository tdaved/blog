<?php

namespace Blog\Model;

/**
 * @author David
 */
class Post implements PostInterface {
    protected $id;
    protected $title;
    protected $text;
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setText($text) {
        $this->text = $text;
    }
}
