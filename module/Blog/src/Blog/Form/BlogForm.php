<?php

namespace Blog\Form;

use Zend\Form\Form;

/**
 * @author David
 */
class BlogForm extends Form {
    
    public function __construct($name = null) {
        parent::__construct('edit');
        
        $this->setAttribute('method', 'post')
             ->setAttribute('action', '?');
        
        $this->add(array(
            'name' => 'post-title',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Title',
                'class' => 'post-title'
            ),
        ));
        
        $this->add(array(
            'name' => 'post-text',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'placeholder' => 'Text',
                'class' => 'post-text'
            ),
        ));
        
        $this->add(array(
            'name' => 'post-submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Apply',
                'class' => 'post-submit'
            )
        ));
        
    }
}
