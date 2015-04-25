<?php
namespace Blog\Form;

use Zend\Form\Form;
use Zend\Validator;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 *
 * @author David
 */
class BlogForm extends Form implements InputFilterProviderInterface
{

    public function __construct($name = null)
    {
        parent::__construct('edit');
        
        $this->setAttribute('method', 'post')->setAttribute('action', '?');
        
        $this->add(array(
            'name' => 'post-title',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Title',
                'class' => 'post-title',
                'autocomplete' => 'off'
            )
        ));
        
        $this->add(array(
            'name' => 'post-text',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'placeholder' => 'What\'s on your mind?',
                'class' => 'post-text'
            )
        ));
        
        $this->add(array(
            'name' => 'post-submit',
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
            'post-title' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                ),
                'validators' => array(
                    new Validator\NotEmpty()
                )
            ),
            'post-text' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                ),
                'validators' => array(
                    new Validator\NotEmpty()
                )
            )
        );
    }
}
