<?php

namespace Blog\Form;

use Zend\Form\Form;

/**
 * @author David
 */
class BlogForm extends Form {
    
    public function __construct($name = null) {
        parent::__construct('edit');
        
        $this->add(array(
            'name' => 'post-title',
            'type' => 'text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        
        $this->add(array(
            'name' => 'post-text',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Text'
            ),
        ));
        
        $this->add(array(
            'name' => 'post-submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Apply'
            )
        ));
        
    }
}
