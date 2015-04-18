<?php

namespace Blog\Model;

/**
 * @author David
 */
interface PostInterface {
    public function getId();
    public function getTitle();
    public function getText();
}
