<?php
namespace Blog\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class CommentForm extends Form implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('edit');
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'content',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'placeholder' => 'What\'s on your mind?',
                'class' => 'post-text'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Apply',
                'class' => 'btn btn-primary post-submit'
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'content' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                ),
                'validators' => array(
                    new Validator\NotEmpty(),
                    new Validator\StringLength(array(
                        'min' => 5
                    ))
                )
                
            )
        );
    }
}
