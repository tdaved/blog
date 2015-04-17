<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author David
 * @ORM\Entity
 */
class User {
    /**
     * @ORM\Id
     * @ORM\GenerateValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $fullName;
    
    function getId() {
        return $this->id;
    }

    function getFullName() {
        return $this->fullName;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFullName($fullName) {
        $this->fullName = $fullName;
    }
}
